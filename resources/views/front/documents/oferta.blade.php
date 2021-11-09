@extends('front.layouts.layout')

@push('title') - Публичная договор-оферта на предоставление доступа к просмотру информации@endpush

@push('testname') Публичная договор-оферта на предоставление доступа к просмотру информации@endpush

@section('content')
    <form role="form" method="get"
          action="{{ route('player.card', ['sid' => $sid]) }}">
        @csrf
        <input type="hidden" name="sid" value="{{ $sid }}">
        @if(!$mail)
            <button type="submit" class="btn btn-primary mb-5" @if(session('branding')) style="{{ session('buttonstyle') }}" @endif>
                <i class="fas fa-chevron-left"></i> Назад
            </button>
        @endif

        <div class="document">
            <!-- Текст документа -->
            <h1>Публичная договор-оферта на предоставление доступа к просмотру информации</h1>

            <p>
                Настоящий публичный договор (далее – Оферта) представляет собой официальное предложение ИП Камалова Юлия
                Салаватовна (далее — Исполнитель) и содержит все существенные условия по оказанию информационных услуг,
                перечень которых публикуется в сети Интернет на сайте <a
                    href="https://personahuman.ru/" target="_blank">https://personahuman.ru</a>.<br/>
                В соответствии со статьей 435 и пунктом 2 статьи 437 Гражданского Кодекса Российской Федерации (далее –
                ГК РФ) настоящая публичная оферта является предложением неопределенному кругу лиц заключить договор об
                оказании информационных услуг и, в случае принятия изложенных ниже условий и оплаты услуг Исполнителя,
                лицо, совершившее акцепт этой Оферты, становится Заказчиком в соответствии с пунктом 3 статьи 438 ГК РФ,
                акцепт Оферты равносилен заключению договора на условиях, изложенных в Оферте.<br/>
                Осуществляя оплату услуг, Заказчик выражает полное и безоговорочное согласие с условиями настоящего
                Договора-Оферты и гарантирует, что уже ознакомлен и принимает все условия Оферты в том виде, в каком они
                изложены в тексте настоящей Оферты, а также ознакомлен со стоимостью Услуги, указанной на Сайте
                Исполнителя.
            </p>

            <h2>Термины и определения</h2>
            <ul>
                <li>Оферта – настоящий документ Договор-оферта между Исполнителем и Заказчиком на оказание
                    информационных услуг
                    Исполнителем, опубликованный в сети Интернет по адресу: <a
                        href="https://personahuman.ru/" target="_blank">https://personahuman.ru</a> (далее по тексту –
                    «Сайт»),
                    который заключается посредством акцепта Оферты.
                </li>
                <li>Акцепт оферты – полное и безоговорочное принятие Оферты путем осуществления Заказчиком действий по
                    внесению оплаты за оказание информационных услуг. Акцепт оферты создает Договор оферты.
                </li>
                <li>Пользователь – это любой человек посещающий сайт Исполнителя: физическое лицо, юридическое лицо,
                    индивидуальный предприниматель, самозанятый гражданин.
                </li>
                <li>Пользователь, осуществивший акцепт оферты, является Заказчиком.</li>
                <li>Сайт – это интернет-ресурс, состоящий из одной, нескольких или множества виртуальных страниц,
                    используемый Администрацией Сайта на правах собственности по доменному адресу <a
                        href="https://personahuman.ru/" target="_blank">https://personahuman.ru</a>.
                </li>
                <li>Информационная услуга (далее Услуга) – процесс передачи информации на адрес электронной почты
                    Заказчика.
                </li>
                <li>Информация – это значимые сведения самостоятельно созданные и получившие на основании закона и
                    договора право разрешать или ограничивать доступ к информации, определяемой по каким-либо признакам,
                    Исполнителем.
                </li>
                <li>Доступ к информации / предоставление информации — действия, направленные на получение информации
                    определенным кругом лиц или передачу информации определенному кругу лиц.
                </li>
                <li>Заказ – запрос Покупателя на получение на указанный электронный адрес Информации, оформленный в
                    соответствии с требованиями Сайта.
                </li>
                <li>Оформление заказа – заполнение Заказчиком адреса электронной почты (e-mail), поля в окне покупки,
                    необходимого для дистанционного предоставления онлайн-доступа к Информации.
                </li>
                <li>Сервис Сайта – программные средства Сайта, дающие возможность Пользователю взаимодействовать с
                    Администрацией Сайта, третьими лицами (платежными сервисами, банками и др.) по поводу осуществления
                    Договора по получению Услуги, её оплаты на Сайте.
                </li>
                <li>Тариф – стоимость онлайн-доступа к Информации Исполнителя.</li>
            </ul>

            <h2>Общие положения / предмет договора</h2>
            <p>
                Предметом настоящей Оферты является получение Заказчиком доступа к просмотру закрытой части информации
                по
                результатам прохождения Пользователем нейротестирования «Persona» на сайте.<br/>
                Оферта считается направленной с момента ее публикации по адресу. Оферта сохраняет полную юридическую
                силу и
                не требует скрепления печатями и/или подписания Заказчиком и Исполнителем, для заключения и исполнения
                Пользователем Оферты не требуется согласия или одобрения каких-либо третьих лиц.<br/>
                Пользователь проинформирован и соглашается с тем, что факт, время и дата акцепта Оферты (заключения
                договора) Пользователем определяются на основании данных Исполнителя.<br/>
                Каждый раз перед тем, как осуществить оплату услуг, Пользователь обязуется ознакомиться с условиями
                оплаты
                услуг. Оплачивая услуги, Пользователь соглашается с условиями оплаты услуг, действующими на дату
                осуществления платежа.<br/>
                Продолжая использовать сайт после даты публикации новой версии Соглашения, в том числе осуществляя
                оплату,
                Пользователь соглашается с условиями новой версии Оферты. В случае если Пользователь не согласен с
                условиями
                новой версии Оферты, Пользователь обязуется не производить оплату услуг после даты публикации новой
                версии
                Оферты, а также прекратить использование сайта на дату окончания полного использования Пользователем
                ранее
                оплаченных услуг.<br/>
                Настоящим Заказчик подтверждает свое согласие на передачу, обработку и хранение своих персональных
                данных
                исключительно для оказания услуг в соответствии с Политикой в отношении обработки персональных данных
                (<a
                    href="https://personahuman.ru/politika_v_otnoshenii_obrabotki_personalnykh-_dannykh/"
                    target="_blank">https://personahuman.ru/politika_v_otnoshenii_obrabotki_personalnykh-_dannykh/</a>).<br/>
                Моментом принятия согласия является заполнение Заказчиком адреса электронной почты (email) в поле формы
                и нажатие на кнопку отправки формы на любой странице Сайта.
            </p>

            <h2>Порядок заключения договора, оформления заказа и его исполнения</h2>
            <p>
                Оферта вступает в силу с момента оплаты Пользователем Услуг Исполнителя способами, указанными в
                настоящей Оферте и на сайте Исполнителя, и действует до полного исполнения Сторонами своих обязательств.<br/>
                Исполнитель оказывает Услугу путем предоставления доступа к просмотру Информации не позднее 1 (одного)
                рабочего дня с даты поступления оплаты от Заказчика в 100% размере на расчётный счёт Исполнителя.<br/>
                Услуга считается оказанной должным образом с момента отправки письма Исполнителем на электронный адрес
                Заказчика, указанный им при оформлении заказа. Исполнитель предоставляет доступ к Информации Заказчику
                навсегда с момента предоставления доступа. Исполнитель считается надлежаще исполнившим свои
                обязательства в момент передачи информации.
            </p>

            <h2>Оплата товара и срок действия договора</h2>
            <p>
                Стоимость услуги по доступу к Информации указывается на Сайте.<br/>
                Платежи за услуги Исполнителя обрабатывает компания, действующая на основании договора с Исполнителем.
                Оплата доступа осуществляется с помощью одной из систем приема платежей, которые доступны на сайте. При
                оплате Услуг на Сайте или на основании полученного на электронную почту уведомления, Заказчик
                автоматически перенаправляется на страницу системы приема платежей для внесения оплаты. Фискальные
                документы отправляются в электронном виде на почту Заказчика, указанную на сайте в соответствии с
                законодательством РФ.<br/>
                Предоставленная (оказанная) Заказчику Исполнителем услуга является разовой.<br/>
                Обязательства Пользователя по оплате считаются исполненными с момента зачисления денежных средств на
                расчетный счет Исполнителя в полном объеме. Дата и время зачисления денежных средств на расчетный счет,
                а также дата и время оплаты услуг определяются на основании данных Исполнителя.<br/>
                Все права и обязанности, возникающие в процессе расчётов, возникают непосредственно между компанией –
                системой приема платежей и плательщиком. Исполнитель не обрабатывает персональные данные плательщиков,
                предоставленные в связи с проведением в системе приёма платежей расчётов по платежам. Исполнитель не
                хранит реквизиты банковских карт на своих ресурсах, в том числе серверах или облачных хранилищах.<br/>
                Исполнитель не контролирует аппаратно-программный комплекс системы приёма платежей. Если в результате
                ошибок произошло списание денежных средств Заказчика, но платеж не был авторизован системой приема
                платежей, обязанности по возврату денежных средств Заказчику лежат на компании системы приёма платежей.
            </p>

            <h2>Права и обязанности сторон</h2>
            <p>
                Стороны несут ответственность за невыполнение, либо ненадлежащее исполнение обязательств по Соглашению в
                соответствии с применимым законодательством и условиями Соглашения.
            </p>

            <h3>Права Исполнителя</h3>
            <p>
                Исполнитель оставляет за собой право внести изменения в условия Оферты и/или отозвать Оферту в любой
                момент по своему усмотрению в одностороннем порядке. В случае внесения изменений в Оферту, такие
                изменения вступают в силу с момента опубликования на Сайте.<br/>
                При выявлении любых фактов распространения данных и информации в сети Интернет Заказчиком Исполнитель
                вправе в одностороннем порядке предпринять меры по расследованию нарушений, указанных в п. 5.5, и
                обратиться в Арбитражный суд по месту нахождения истца, в порядке, предусмотренном действующим
                законодательством РФ.<br/>
                Исполнитель вправе оказывать иные услуги, описание, объем, характеристики и условия оказания которых
                могут быть указаны в Оферте и/или на Сайте.<br/>
                Исполнитель вправе использовать электронную почту, номер телефона, а также другие данные,
                предоставленные Пользователем, для отправки Пользователю информации и рекламных материалов, в том числе
                для информирования Пользователя о деятельности компании Исполнителя и о ходе исполнения Оферты.
            </p>

            <h3>Обязанности Исполнителя</h3>
            <p>
                Исполнитель обязан в течении 10 дней рассмотреть претензию Заказчика, и при условии правомерности
                требований
                вернуть денежные средства. Возврат денежных средств производится за вычетом банковской комиссии.
                Исполнитель
                вправе запросить дополнительные документы и/или информацию, необходимые для осуществления возврата
                денежных
                средств, в этом случае возврат осуществляется в течение 10 (десяти) календарных дней после получения
                Исполнителем таких документов и/или информации.<br/>
                Исполнитель обязуется не разглашать конфиденциальную информацию, предоставленную Пользователем в связи с
                выполнением Оферты (за исключением общедоступной информации или информации, предоставленной
                Пользователем
                при регистрации на сайте), третьим лицам без предварительного согласия Пользователя.
            </p>

            <h3>Права Заказчика</h3>
            <p>
                Заказчик вправе использовать предоставленный ему доступ исключительно для индивидуального просмотра в
                режиме онлайн.<br/>
                Заказчик может инициировать расторжение договора с возвратом денежных средств, в случае если оплаченная
                услуга ему не была оказана или оказана не надлежащим образом путем отправки письма на электронный адрес
                Исполнителя, указанный в реквизитах, с указанием причины (претензия). К претензии (скан-копии) навозврат
                денежных средств должны быть приложены копии документов: удостоверяющих личность, а также другие
                документы подтверждающие позицию Пользователя.
            </p>

            <h3>Обязанности Заказчика</h3>
            <p>
                Заказчик обязуется никому не сообщать и не распространять данные и полученную Информацию, и использовать
                их только для личного пользования.<br/>
                Заказчик не вправе создавать копии, использовать для коллективного просмотра или просмотра третьими
                лицами.<br/>
                При нарушении этих условий Исполнитель вправе потребовать от Заказчика возмещения убытков.<br/>
                Заказчик обязан указать, при оформлении заказа, точный и действующий адрес электронной почты для
                предоставления доступа к оплаченной Информации. Заказчик несет ответственность за достоверность
                предоставленных данных при оформлении заказа.<br/>
                Заказчик обязуется самостоятельно обеспечивать техническую возможность пользования Услугой Исполнителя
                со своей стороны, а именно: надлежащий доступ в интернет, наличие программного обеспечения, совместимого
                с передачей информации от Исполнителя и других необходимых средств для онлайн-просмотра.<br/>
                Заказчик обязуется предоставлять Исполнителю все данные, запрашиваемые сайтом Исполнителя, которые
                необходимы для оказания услуг. Предоставляя данные Исполнитель, в том числе при регистрации на сайте,
                Пользователь соглашается на обработку предоставленных данных в соответствии с Политикой
                конфиденциальности, размещенной по ссылке:
                <a href="https://personahuman.ru/politika_v_otnoshenii_obrabotki_personalnykh-_dannykh/"
                   target="_blank">
                    https://personahuman.ru/politika_v_otnoshenii_obrabotki_personalnykh-_dannykh</a>,
                являющейся неотъемлемой частью Оферты.<br/>
                Заказчик обязан: воздерживаться от любых действий, которые нарушают права Исполнителя на результаты
                интеллектуальной деятельности, в частности, не копировать, не записывать, не воспроизводить, не
                распространять любые результаты интеллектуальной деятельности Исполнителя без письменного разрешения
                Исполнителя; немедленно сообщать Исполнителю о любых ставших известными фактах нарушения исключительных
                прав Исполнителя; не предоставлять свои аутентификационные данные третьим лицам.
            </p>

            <h2>Ограничения ответствености</h2>
            <p>
                Заказчик признает и соглашается с тем, что использование доступа к Информации не гарантирует получение
                Заказчиком какого-либо определенного результата при её использовании.<br/>
                Заказчик признает и соглашается с тем, что информация на web-страницах Сайта не является призывом к
                действию, представлена в целях ознакомления и может быть не полноценной, Заказчик сам проверяет её
                актуальность на момент посещения Сайта.<br/>
                Исполнитель освобождается от ответственности по доставке Информации Заказчику, в случае умышленного
                искажения Заказчиком адреса доставки (email).<br/>
                Исполнитель предупреждает о том, что Пользователь должен отдавать себе отчет о существовании возможности
                наступления негативных последствий в результате совершения (не совершения) соответствующих действий, на
                основании Информации полученной от Исполнителя, в связи с чем, должен самостоятельно принимать решение
                воспользоваться или нет Информацией. Пользователь сайта принимая решение, берет на себя ответственность
                за возможные последствия.<br/>
                Исполнитель не несет ответственности перед Заказчиком за любые задержки, прерывания при передачи данных
                или соединении, ущерб или потери, происходящие из-за дефектов в любом электронном или механическом
                оборудовании, не принадлежащем Исполнителю, при отсутствии вины Исполнителя.<br/>
                Исполнитель не несет ответственность за соответствие Информации ожиданиям Заказчика, за исключением
                случаев, когда описание структуры Информации на сайте не соответствует полученной на электронный адрес
                Заказчика на день оформления заказа.<br/>
                Исполнитель не несет ответственности за несоответствие услуг и функциональных возможностей сайта
                ожиданиям Пользователя за его субъективную оценку, такоенесоответствие ожиданиям и/или отрицательная
                субъективная оценка не являются основаниями считать услуги оказанными не качественно, и/или не в
                согласованном объеме, также, как и не является таким основанием мнение третьих лиц (в том числе
                сотрудников государственных органов) отличное от мнения Исполнителя (его сотрудников и/или
                партнеров).<br/>
                Исполнитель не несет ответственности за временные сбои и перерывы в работе интернет ресурсов не по вине
                Исполнителя и вызванную ими потерю информации.<br/>
                Все услуги, предоставляемые на сайте, не являются образовательными и не направлены на просвещение, а
                являются исключительно информационными.
            </p>

            <h2>Форс-мажор</h2>
            <p>
                Стороны освобождаются от ответственности за неисполнение или ненадлежащее исполнение обязательств,
                вытекающих из Договора, если причиной неисполнения (ненадлежащего исполнения) являются обстоятельства
                непреодолимой силы, к которым, среди прочих, относятся аварии на инженерных сооружениях и коммуникациях,
                стихийные бедствия, техногенные аварии и катастрофы, массовые беспорядки, военные действия,
                террористические
                акты, нормативные акты органов государственной власти и местного самоуправления, препятствующие
                исполнению
                Сторонами своих обязательств по Договору, то есть чрезвычайные и непреодолимые при данных условиях
                обстоятельства, наступившие после заключения Договора.
                Сторона, которая не может выполнить обязательства по Оферте, должна своевременно, но не позднее пяти
                календарных дней после наступления обстоятельств непреодолимой силы, письменно известить другую Сторону,
                с
                предоставлением обосновывающих документов, выданных компетентными органами.
            </p>

            <h2>Уведомления и электронный документооборот</h2>
            <p>
                Если иное не предусмотрено в Договоре или действующим законодательством, любые уведомления, запросы или
                иные сообщения (корреспонденция), представляемые Сторонами друг другу, должны быть оформлены в
                письменном виде и направлены получающей Стороне по почте, путем направления заказной корреспонденции, по
                электронной почте (на адрес и (или) с адреса Исполнителя, указанного в разделе 13 Оферты на адрес и
                (или) с адреса Заказчика, указанного в паспорте или при помощи курьерской службы.<br/>
                Датой получения корреспонденции считается дата получения уведомления о доставке почтового отправления, в
                том числе заказной корреспонденции, электронного подтверждения доставки при отправлении электронной
                почтой (или в отсутствии такового – момент отправления сообщения), или день доставки в случае
                отправления корреспонденции с курьером. При рассмотрении споров в суде переписка Сторон по электронной
                почте будут
                признаны Сторонами достаточными доказательствами.<br/>
                При исполнении (изменении, дополнении, прекращении) Оферты, а также при ведении переписки по указанным
                вопросам допускается использование аналогов собственноручной подписи Сторон. Стороны подтверждают, что
                все уведомления, сообщения, соглашения и документы в рамках исполнения Сторонами обязательств, возникших
                из Оферты, подписанные аналогами собственноручной подписи Сторон, имеют юридическую силу и обязательны
                для исполнения Сторонами. Под аналогами собственноручной подписи понимаются уполномоченные адреса
                электронной почты и учетные данные Пользователя.<br/>
                Стороны признают, что все уведомления, сообщения, соглашения, документы и письма, направленные с
                использованием уполномоченных адресов электронной почты, считаются направленными и подписанными
                Сторонами, кроме случаев, когда в таких письмах прямо не указано обратное.<br/>
                Уполномоченными адресами электронной почты Сторон признаются: · Для Исполнителя: <a
                    href="mailto:in@personahuman.ru">in@personahuman.ru</a>. Для
                Заказчика: адрес электронной почты, указанный при регистрации на Сайте.<br/>
                Стороны обязуются обеспечивать конфиденциальность сведений и информации, необходимых для доступа к
                уполномоченным адресам электронной почты и Личному кабинету, не допускать разглашение такой информации и
                передачу третьим лицам. Стороны самостоятельно определяют порядок ограничения доступа к такой
                информации.<br/>
                До момента получения от Заказчика информации о нарушения режима конфиденциальности все действия и
                документы, совершенные и направленные с помощью уполномоченного адреса электронной почты Заказчика и
                Личного кабинета, даже если такие действия и документы были совершены и направлены иными лицами,
                считаются совершенными и направленными Заказчиком. В этом случае права и обязанности, а также
                ответственность наступают у Пользователя.
            </p>

            <h2>Разрешение споров</h2>
            <p>
                Все споры и разногласия решаются путем переговоров Сторон. В случае если споры и разногласия не
                урегулированы путем переговоров, они подлежат разрешению в порядке, установленном законодательством РФ.
                В случае возникновения любых разногласий между Заказчиком и Исполнителем относительно исполнения каждой
                из сторон условий Договора, а также любых иных разногласий, такие разногласия должны быть урегулированы
                с
                применением обязательного досудебного претензионного порядка.<br/>
                Исполнитель обязуется направить Заказчику претензию в электронном виде на адрес электронной почты,
                указанный Заказчиком при регистрации на Сайте.<br/>
                Заказчик обязуется направить Исполнителю претензию в электронном виде на адрес электронной почты, а
                также
                продублировать в претензию в письменном виде на адрес Исполнителя, указанный в разделе 13 Договора. Срок
                ответа на претензию — 10 (десять) рабочих дней со дня ее получения. Если Законодательством РФ установлен
                меньший срок, то применяется срок, установленный законодательством. При несоблюдении любой из сторон
                всех
                перечисленных выше условий обязательный претензионный порядок не считается соблюденным.
            </p>

            <h2>Авторское право</h2>
            <p>
                Исполнителю принадлежат права на Сайт, в том числе, права на любые входящие в его состав результаты
                интеллектуальной деятельности, включая программный код, размещенные на сайте произведения дизайна,
                тексты, средства индивидуализации (фирменное наименование, товарные знаки, знаки обслуживания,
                коммерческие обозначения).<br/>
                Предоставление Пользователю доступа к сайту осуществляется исключительно в целях надлежащего оказания
                услуг по Оферте и не предусматривает передачу каких-либо прав на сайт и/или их компоненты. Доступ
                прекращается (ограничивается) на условиях настоящей Оферты.<br/>
                Пользователь не вправе использовать размещенные на Сайте результаты интеллектуальной деятельности
                (включая, но не ограничиваясь: текст, элементы дизайна, графические изображения, а также программный код
                сайта, какой-либо контент сайта) без предварительного письменного согласия Исполнителя (в том числе, но,
                не ограничиваясь, воспроизводить, копировать, перерабатывать, распространять в любом виде).<br/>
                Сайт, все его элементы, предоставляются в состоянии «как есть» и «как доступно». Пользователь не вправе
                требовать внесения каких-либо изменений в Сайт. Исполнитель не гарантирует доступность сайта в любой
                момент.<br/>
                В случае если в процессе оказания услуг Пользователем на сайте будут размещены какие-либо материалы в
                текстовой и/или графической и/или аудиовизуальной и/или любой иной форме (далее — материалы),
                Пользователь предоставляет Исполнителю право использовать такие материалы без оплаты на территории всего
                мира сроком на 15 (пятнадцать) лет с даты размещения следующими способами: распространение,
                воспроизведение материалов как полностью, так и любых их фрагментов, в том числе путем размещения на
                сайте и иных интернет-ресурсах; переработка материалов; доведение материалов до всеобщего сведения.
                Исполнитель не обязан предоставлять Пользователю отчеты об использовании материалов. Ответственность за
                содержание материалов несет Пользователь.<br/>
                Размещая на сайте или направляя на сайт в целях размещения контент, Пользователь заверяет и гарантирует,
                а также обязуется постоянно обеспечивать в отношении такого контента соблюдение всех следующих
                требований: (1) принадлежность исключительного права на контент и любые элементы контента Пользователю,
                либо Пользователь обладает лицензией, предоставляющей право использовать и разрешать иным лицам
                использовать контент в объеме и способами, предусмотренными настоящим разделом Оферты; (2) если контент
                включает какие-либо фирменные и иные наименования, товарные знаки, имена, изображения или охраняемую
                законом символику иных лиц, Пользователем получены все необходимые согласия на использование таких
                объектов в объеме и способами, предусмотренными настоящим разделом Соглашения; (3) контент не умаляет
                чести, достоинства и/или деловой репутации каких-либо третьих лиц; (4) контент и его использование
                Исполнитель в объеме и способами, указанными в настоящем разделе, не нарушает какие-либо иные права и
                законные интересы третьих лиц; (5) контент не содержит информации, ссылок, материалов, которые нарушают
                исключительные права третьих лиц или распространение которых иным образом нарушает применимое
                законодательство.<br/>
                В случае предъявления к Исполнителю каких-либо претензий и/или исков со стороны третьих лиц в связи с
                возможным нарушением предоставленных прав в результате размещения Пользователем контента на Сайте
                Исполнителя, Пользователь обязуется самостоятельно урегулировать такие претензии полностью, освободив
                Исполнителя от ответственности, в том числе от любых выплат в пользу таких лиц и возместить Исполнителю
                убытки.<br/>
                Использование Заказчиком Сайта, ее содержимого и составляющих (как в целом, так и фрагментарно) и прочих
                разработанных Исполнителем технических решений не означает передачи (отчуждения) Заказчику и /или любому
                третьему лицу прав на результаты интеллектуальной деятельности, как в целом, так и в части, в том числе
                и на информацию передаваемой Заказчику, указанную в п. 1.1. настоящей Оферты.
            </p>

            <h2>Прочие условия</h2>
            <p>
                Стороны признают, что, если какое-либо из положений Оферты становится недействительным в течение срока
                его
                действия вследствие изменения законодательства, остальные положения Оферты обязательны для Сторон в
                течение
                срока действия Оферты.
            </p>

            <h2>Конфиденциальность</h2>
            <p>
                Пользователь обязуется не разглашать конфиденциальную информацию и иные данные, предоставленные
                Исполнителю в ходе исполнения Оферты (за исключением общедоступной информации), третьим лицам без
                предварительного письменного согласия Исполнителя.<br/>
                К конфиденциальной относится любая информация, относящаяся к процессу оказания Услуг Исполнителем,
                неопубликованная в открытом доступе и не являющаяся доступной для всеобщего сведения.<br/>
                Заказчик обязуется не разглашать конфиденциальную информацию и иные данные, предоставленные Исполнителем
                в ходе оказания Услуг (за исключением общедоступной информации), третьим лицам без предварительного
                письменного согласия Исполнителя.
            </p>

            <h2>Реквизиты</h2>
            <p>
                <strong>Индивидуальный предприниматель Камалова Юлия Салаватовна</strong>
                Юр. адрес: 171090, Тверская обл, ЗАТО Озерный, ул. Лениградская д. 18, кв. 63<br/>
                Почт. адрес: 111399, г. Москва, Зеленый пр-т, д. 67, корп. 2, кв. 53<br/>
                ОГРНИП 318695200015563<br/>
                ИНН / КПП 690700389266<br/>
                Телефон: <a href="tel:+79261620962">+7 (926) 162 09 62</a><br/>
                e-mail: <a href="mailto:in@personahuman.ru">in@personahuman.ru</a>
            </p>
            <!-- .Текст документа -->
        </div>
    </form>
@endsection
