@servers(['web' => 'bitrix@192.168.0.125'])


@setup
    $repository = 'https://github.com/avp365/php_constr_laravel.git';
    $releases_dir = '/var/www/app/releases';
    $app_dir = '/ext_www';
@endsetup


@story('deploy')
    clone_repository
    run_composer
@endstory


@task('clone_repository', ['on' => 'web'])
    cd /ext_www
    git clone --single-branch --branch {{ $repository }}  homework-v.loc
@endtask

@task('composer')
    echo "Starting deployment ({{ $release }})"
    cd {{ $releases_dir }}

    composer install --prefer-dist --no-scripts -q -o
@endtask

