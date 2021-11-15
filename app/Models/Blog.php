<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Blog extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['name', 'slug', 'digest', 'image', 'description', 'publish'];

    public function tags(): BelongsToMany
	{
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

	public static function uploadMedia(Request $request, string $fileField, string $fileName = null): bool|string|null
	{
		if($request->hasFile($fileField)) {
			if($fileName)
				if(FileLink::unlink($fileName))
					Storage::delete($fileName);
			$folder = date('Y-m-d');
			return $request->file($fileField)->store("images/{$folder}");
		}
		return null;
	}

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
