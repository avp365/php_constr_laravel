@servers(['web' => 'bitrix@192.168.0.125'])


@setup
    $repository = 'https://github.com/avp365/php_constr_laravel.git';
    $releases_dir = '/ext_www/homework-v.loc'
    $project_dir = 'ext_www';
@endsetup


@story('deploy')
    clone_repository
    run_composer
@endstory


@task('clone_repository', ['on' => 'web'])
    cd {{$project_dir}}
    rm -R homework-v.loc
    git clone {{ $repository }}  {{$dir}}
@endtask

@task('run_composer')
    echo "Starting deployment"
    cd {{ $releases_dir }}

    composer install --prefer-dist --no-scripts -q -o
@endtask

