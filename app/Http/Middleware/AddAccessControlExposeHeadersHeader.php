<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Для получения данных внешний сайт использует кросс-серверные запросы (CORS),
 * Поэтому у JavaScript нет доступа ко всем заголовкам, кроме т.н. простых.
 * В частности, нет доступа и к заголовку Content-Disposition.
 * Это приводит к тому, что все файлы скачиваются с именем undefined.
 *
 * Посредник проверяет тип запроса,
 * И в случае скачивания файла добавляет к ответу заголовок
 * Access-Control-Expose-Headers: Content-Disposition
 */
class AddAccessControlExposeHeadersHeader
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    $response = $next($request);

    // если это выгрузка
    $isFileResponse = $response instanceof BinaryFileResponse;

    // разрешаем JS прочитать заголовок Content-Disposition
    if ($isFileResponse) {
        $response->headers->set('Access-Control-Expose-Headers', 'Content-Disposition', false);
    }

    return $response;
  }
}
