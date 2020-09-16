@servers(['web' => 'bitrix@192.168.0.125'])


@setup
    $repository = 'https://github.com/avp365/php_constr_laravel.git';
    $dir = 'homework-v.loc';
    $project_dir = 'ext_www';
@endsetup


@story('deploy')
    clone_repository
    run_composer
    tests
@endstory


@task('clone_repository', ['on' => 'web'])
    cd {{$project_dir}}
    rm -R homework-v.loc
    git clone --single-branch --branch envoy {{ $repository }}  {{$dir}}
@endtask

@task('run_composer')
    echo "Starting deployment"
    cd {{$project_dir}}'/'{{$dir}}
    composer install --prefer-dist --no-scripts -q -o
@endtask

@task('tests')
php vendor/bin/phpunit --testdox
@endtask
