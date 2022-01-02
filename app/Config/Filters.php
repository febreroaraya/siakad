<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'     => CSRF::class,
        'toolbar'  => DebugToolbar::class,
        'honeypot' => Honeypot::class,
        'filteradmin' => \App\Filters\FilterAdmin::class,
        'filterssw' => \App\Filters\FilterSsw::class,
        'filterggr' => \App\Filters\FilterGgr::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            'filteradmin' => ['except' => [
                'auth', 'auth/*',
                'home', 'home/*',
                '/'
            ]],
            'filterssw' => ['except' => [
                'auth', 'auth/*',
                'home', 'home/*',
                '/'
            ]],
            'filterggr' => ['except' => [
                'auth', 'auth/*',
                'home', 'home/*',
                '/'
            ]],
            // 'honeypot',
            // 'csrf',
        ],
        'after' => [
            'filteradmin' => ['except' => [
                'admin', 'admin/*',
                'home', 'home/*',
                'kelas', 'kelas/*',
                'gedung', 'gedung/*',
                'ruangan', 'ruangan/*',
                'jurusan', 'jurusan/*',
                'ta', 'ta/*',
                'mapel', 'mapel/*',
                'user', 'user/*',
                'guru', 'guru/*',
                'siswa', 'siswa/*',
                'fakultas', 'fakultas/*',
                'jadwalpelajaran', 'jadwalpelajaran/*',
            ]],
            'filterssw' => ['except' => [
                'ssw', 'ssw/*',
                'home', 'home/*',
                'krs', 'krs/*',
                '/',
            ]],
            'filterggr' => ['except' => [
                'ggr', 'ggr/*',
                'home', 'home/*',
                '/',
            ]],
            'toolbar',
            // 'honeypot',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
