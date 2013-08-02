<?php
/**
 * AssetsGeneratorCommand
 *
 * This is a console command for publishing assets from console
 *
 * @author RoliesTheBee <rolies106@gmail.com>
 * @version 0.1.0
 */
class MigrateAllCommand extends CConsoleCommand
{
    public $defaultAction = 'up';

    public function actionIndex()
    {
        echo <<<EOD
This is the command for the ModuleMigrations. Usage:

    ./yiic migrateall <command>

Available commands are:

    up

EOD;
    }

    private function runMigrationTool($migrationPath = null) {
        $commandPath = Yii::app()->getBasePath() . DIRECTORY_SEPARATOR . 'commands';
        $runner = new CConsoleCommandRunner();
        $runner->addCommands($commandPath);
        $commandPath = Yii::getFrameworkPath() . DIRECTORY_SEPARATOR . 'cli' . DIRECTORY_SEPARATOR . 'commands';
        $runner->addCommands($commandPath);
        $args = array('yiic', 'migrate', '--interactive=0');

        if (!empty($migrationPath)) {
            $args[] = '--migrationPath=' . $migrationPath;
        }

        ob_start();
        $runner->run($args);
        echo htmlentities(ob_get_clean(), null, Yii::app()->charset);
    }

    public function actionUp()
    {
        $modules = $this->retrieveModules();

        $this->runMigrationTool();

        if (!empty($modules)) {
            foreach ($modules as $module) {
                $path = 'application.modules.' . $module . '.migrations';
                $realPath = YiiBase::getPathOfAlias($path);

                if (file_exists($realPath) && is_dir($realPath)) {
                    $this->runMigrationTool($path);
                }
            }
        }
    }

    protected function retrieveModules()
    {
        $mainConfig = @include(dirname(__FILE__) . '/../config/main.php');
        $modules = $mainConfig['modules'];
        $result = array();

        if (!empty($modules)) {
            foreach ($modules as $key => $value) {
                $module_name = $key;
                if (is_numeric($module_name)) {
                    $module_name = $value;
                } else {
                    if (!empty($value['class'])) {
                        $path = YiiBase::getPathOfAlias($value['class']);
                        $module_name = basename(dirname($path));                        
                    }
                }

                $result[] = $module_name;
            }                    
        }

        return $result;
    }
}