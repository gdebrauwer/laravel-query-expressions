<?php

declare(strict_types=1);

use Illuminate\Database\Query\Expression;
use Tpetry\QueryExpressions\Function\String\Lower;

it('can lowercase a column')
    ->expect(new Lower('val'))
    ->toBeExecutable(['val varchar(255)'])
    ->toBeMysql('lower(`val`)')
    ->toBePgsql('lower("val")')
    ->toBeSqlite('lower("val")')
    ->toBeSqlsrv('lower([val])');

it('can lowercase an expression')
    ->expect(new Lower(new Expression('\'foo\'')))
    ->toBeExecutable()
    ->toBeMysql('lower(\'foo\')')
    ->toBePgsql('lower(\'foo\')')
    ->toBeSqlite('lower(\'foo\')')
    ->toBeSqlsrv('lower(\'foo\')');
