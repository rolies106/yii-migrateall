# Yii Migrate All Command v1.0

Yii Migrate All allow you to do migrations in several module in just one command, e.g you have module `user`, `article`, `rights`, etc, and after fetch some updates you need to check is there any migrations that need to run on those modules, instead run migrate with `--migrationPath` for each module you can just run one command to check all migrations.

This command only run migrations for all active module or module that already listed in your `config/main.php`.


## Instalation

Just copy `MigrateAllCommand.php` to your `protected/commands` folder.

## How to

Migrate up all modules


```bash
./protected/yiic migrate

or

./protected/yiic migrate up    
```

## Copyrights

Copyright (c) 2013 Rolies106

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.