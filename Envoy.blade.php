@servers(['web' => ['bitrix@192.168.0.125]])

@story('deploy')
git
@endstory

@task('git', ['on' => 'web'])
cd /ext_www/
git clone --single-branch --branch https://github.com/avp365/php_constr_laravel  homework-v.loc
@endtask

@task('composer')
composer install
@endtask

@task('tests')
php vendor/bin/phpunit --testdox
@endtask
