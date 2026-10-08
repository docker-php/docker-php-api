Docker PHP API
==============

Generated API client from the OpenAPI specification of [Docker](https://www.docker.com/),
using the [Jane](https://github.com/janephp/janephp) OpenAPI client generator.

[![Documentation](https://img.shields.io/badge/docs-Mintlify-blue?style=flat-square)](https://docker-php.mintlify.site/)
[![Latest Version](https://img.shields.io/packagist/v/docker-php/docker-php-api.svg?style=flat-square)](https://packagist.org/packages/docker-php/docker-php-api)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/docker-php/docker-php-api.svg?style=flat-square)](https://packagist.org/packages/docker-php/docker-php-api)

## Documentation

The [Docker PHP documentation](https://docker-php.mintlify.site/) covers the
3.0 client, API versioning and migration.

## New maintainers

After this repository was archived, the code was forked in
[beluga-php/docker-php-api](https://github.com/beluga-php/docker-php-api), where
maintenance and improvements continued.

We later contacted [joelwurtz](https://github.com/joelwurtz) and agreed to take over
maintenance of the original `docker-php/docker-php-api` repository to give you a
better upgrade path. Development will continue here, and we will archive
`beluga-php/docker-php-api` once the migration is complete.

Version `7.1.55.0` of this package targets Docker Engine API v1.55. It works
with the [Docker PHP client](https://github.com/docker-php/docker-php) 4.0 or
later. Each Docker API version has its own branch and release line.

## Requirements

- PHP 8.1 or later, with the `mbstring` extension.
- [Composer](https://getcomposer.org/).
- Access to a Docker daemon that accepts API v1.55 requests.

## Usage

For most applications, use the [docker-php client](https://github.com/docker-php/docker-php)
instead of this package directly. It adds connection handling and decoded log
and exec streams. Require this API line next to it to use Docker API v1.55:

```bash
composer require "docker-php/docker-php:^4.0" "docker-php/docker-php-api:>=7.1.55.0 <7.1.56.0"
```

See the [client README](https://github.com/docker-php/docker-php#usage) for examples.

If your application depends directly on the generated client or models, require
the matching API line:

```bash
composer require "docker-php/docker-php-api:>=7.1.55.0 <7.1.56.0"
```

For direct client use, provide compatible PSR-18, PSR-17 and PSR-7 implementations
and configure the daemon connection on your HTTP client. The PHP namespace
remains `Docker\API`.

## Versioning

See the official [Docker Engine API v1.55 reference](https://docs.docker.com/reference/api/engine/version/v1.55/)
for endpoint descriptions, parameters and response schemas matching this API line.

This package does not follow semantic versioning. It retains the four-part
version scheme used by previous releases:

- The first number is the Jane major version used to generate the code.
- The second and third numbers are the Docker Engine API version.
- The last number is the revision for that API specification.

For example, `7.1.55.0` is Docker Engine API v1.55 generated with Jane 7,
revision 0. Version `3.0` refers to the Docker PHP client, not this package.

Pin one Docker API line. Use `>=7.1.55.0 <7.1.56.0` to allow newer revisions of
API v1.55 without changing specifications. Avoid broad constraints such as
`^7.1.55.0`, which also allow different Docker API versions. See
[Composer's version constraints](https://getcomposer.org/doc/articles/versions.md).

Each API line has its own generated endpoints and models. Changing the version
in request URLs does not add fields or endpoints from another specification.

## Migrating to the new releases

### From docker-php-api 4.x

The new package requires PHP 8.1 or later, PSR-7 v2 and Jane 7 runtimes. Review
endpoint signatures and model types before upgrading from Jane 4-generated code.
Change an explicit `docker-php/docker-php-api:4.1.*` requirement to the API v1.55
range above.

If you also use `docker-php/docker-php`, upgrade it to 4.0 at the same time and
follow its [migration guide](https://docker-php.mintlify.site/migration).
Resolve the dependency changes together, test your application and commit the
updated `composer.lock`.

### From beluga-php

Replace an explicit `beluga-php/docker-php-api` requirement with
`docker-php/docker-php-api:>=7.1.55.0 <7.1.56.0`. If your application only requires
the Docker PHP client, switch to `docker-php/docker-php:^4.0` and let it install
the API dependency.

The `Docker\API` namespace is unchanged. Use one package family at a time: the
Beluga and original packages contain the same PHP classes. Replace any Beluga
client requirement at the same time, test the application and commit its updated
`composer.lock`.

## Generation

This API line is generated from [spec/v1.55.json](spec/v1.55.json). The spec is
Docker's [`api/docs/v1.55.yaml`](https://github.com/moby/moby/blob/02a344f1d04788e204f51c447cbf6758194ee118/api/docs/v1.55.yaml)
at commit `02a344f1d047`, converted to OpenAPI 3 with `swagger2openapi` 7.0.8. It uses the
configuration in [.jane-openapi](.jane-openapi). The generator requires Jane
7.14.4 or later within the Jane 7 release line. Generation uses Jane's upstream
output without local patches.

Install the development dependencies, generate the code and apply the project's
formatting:

```bash
composer install
composer run-script generate
composer run-script lint-fix
```

Change the specification or generator configuration rather than editing
generated files by hand. Review the generated diff before committing it.

## Credits

This package was created by [Joel Wurtz](https://github.com/joelwurtz).

## License

[MIT](LICENSE).
