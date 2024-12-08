<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . "/../routes/web.php",
        commands: __DIR__ . "/../routes/console.php",
        health: "/up"
    )
    ->withMiddleware(function (Middleware $middleware) {
        // 使用 validateCsrfTokens 方法排除特定路由的 CSRF 檢查
        $middleware->validateCsrfTokens(
            // 指定要排除 CSRF 保護的路由
            except: ["*"]
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
