# Zzapi: JSON API for Zzap! and other magazines

Zzapi is a RESTful API that exposes relevant informations contained in Zzap.it database in an easy to use JSON format.
Even originally created for Zzap! magazine, it can be used to expose data bt every other Internet project that brought magazine scans online.

## Technical details
- Based on [Laravel Lumen](https://lumen.laravel.com).
- Please note: the database is not provided right now. An example DB for MySQL will be provided soon.

## Entities

- List of magazines:  
/api/v1/magazine

- Details of a magazine, including issues information  
/api/v1/magazine/1

- List of issued of a magazine  
/api/v1/magazine/1/issue

- Details of an issue of a magazine  
/api/v1/magazine/1/issue/9

- List of all editors of all magazines  
/api/v1/editor

- List of all editors of a magazine  
/api/v1/editor/1

- List of all contributors to issue scans  
/api/v1/scan-author

## Known clients using Zzapi
- [Progetto Zzap! Italia](http://zzap.it)

## Ruby on Rails version
An old, unmaintained version written in RoR is available here: https://github.com/seuck/zzap-api

## License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
