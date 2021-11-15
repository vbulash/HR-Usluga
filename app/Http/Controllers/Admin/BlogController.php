<?php

namespace App\Http\Controllers\Admin;

use App\Events\ToastEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\FileLink;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Blog;
use Exception;
use DateTime;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
	/**
	 * Process datatables ajax request.
	 *
	 * @return JsonResponse
	 * @throws Exception
	 */
	public function getData(): JsonResponse
	{
		return Datatables::of(Blog::all())
			->editColumn('publish', function ($blog) {
				$publish = DateTime::createFromFormat('Y-m-d', $blog->publish);
				return $publish->format('d.m.Y');
			})
			->addColumn('action', function ($blog) {
				$editRoute = route('blog.edit', ['blog' => $blog->id]);
				$showRoute = route('blog.show', ['blog' => $blog->id]);
				$action = "<a href=\"$editRoute\" class=\"btn btn-info btn-sm float-left mr-1\" " .
					"data-toggle=\"tooltip\" data-placement=\"top\" title=\"Редактирование\">\n" .
					"<i class=\"fas fa-pencil-alt\"></i>\n" .
					"</a>\n";
				$action .=
					"<a href=\"$showRoute\" class=\"btn btn-info btn-sm float-left mr-1\" " .
					"data-toggle=\"tooltip\" data-placement=\"top\" title=\"Просмотр\">\n" .
					"<i class=\"fas fa-eye\"></i>\n" .
					"</a>\n";
				$action .=
					"<a href=\"javascript:void(0)\" class=\"btn btn-info btn-sm float-left mr-1\" " .
					"data-toggle=\"tooltip\" data-placement=\"top\" title=\"Удаление\" onclick=\"clickDelete($blog->id)\">\n" .
					"<i class=\"fas fa-trash-alt\"></i>\n" .
					"</a>\n";
				return $action;
			})
			->make(true);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Factory|View|Application
	 */
    public function index(): Factory|View|Application
    {
        $blog = Blog::all()->sortBy('publish', SORT_DESC);
		return view('admin.blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
	 */
    public function create(): View|Factory|Application
	{
        return view('admin.blog.create');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param BlogRequest $request
	 * @return RedirectResponse
	 */
    public function store(BlogRequest $request): RedirectResponse
	{
        $data = $request->all();
		$publish = DateTime::createFromFormat('d.m.Y', $request->publish);
		$data['publish'] = $publish->format('Y-m-d');
		$mediaPath = Blog::uploadMedia($request, 'image');
		if($mediaPath) {
			FileLink::link($mediaPath);
			$data['image'] = $mediaPath;
		}
		$blog = Blog::create($data);
		$blog->save();

		session()->flash('success', 'Запись блога № ' . $blog->id . ' сохранена');
		return redirect()->route('blog.index');
    }

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 * @return View|Factory|Response|Application
	 */
    public function show(int $id): View|Factory|Response|Application
    {
		return $this->edit($id, true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(int $id, bool $show = false): View|Factory|Response|Application
    {
        $blog = Blog::findOrFail($id);
		return view('admin.blog.edit', compact('blog', 'show'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BlogRequest $request
     * @param  int  $id
     * @return RedirectResponse
	 */
    public function update(BlogRequest $request, int $id): RedirectResponse
	{
		$data = $request->all();
        $blog = Blog::findOrFail($id);

		$publish = DateTime::createFromFormat('d.m.Y', $request->publish);
		$data['publish'] = $publish->format('Y-m-d');

		$mediaPath = Blog::uploadMedia($request, 'image', $blog->image);
		if($mediaPath) {
			FileLink::link($mediaPath);
			$data['image'] = $mediaPath;
		}
		$blog->update($data);

		if($request->show)
			session()->flash('success', 'Запись блога № ' . $blog->id . ' обновлена');
		return redirect()->route('blog.index');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Request $request
	 * @param int $blog_id
	 * @return bool
	 */
	public function destroy(Request $request, int $blog_id): bool
	{
		if ($blog_id == 0) {
			$id = $request->id;
		} else $id = $blog_id;

		$blog = Blog::findOrFail($id);
		if($blog->image)
			if(FileLink::unlink($blog->image))
				Storage::delete($blog->image);
		$blog->delete();

		event(new ToastEvent('success', '', "Запись блога № $id удалена"));
		return true;
	}
}
