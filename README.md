# No longer maintained

I'm backing off maintaining this library due to a lack of motivation, time and usage of docker, contact me on twitter https://twitter.com/joelwurtz if you wish to take over this repository (or just do a fork).

# Docker PHP Api

Generated API Client from OpenAPI specification of Docker, by Jane OpenAPI Client generator.

## Usage

You should not use this library directly, please use the docker-php one instead.

## Versioning

This library does *not* respect semver and will instead follow Jane OpenAPI version and Docker API version:

 * First number is the Jane major version used for generating the files
 * Second and third number are the Docker API Version
 * Last number is the minor revision number for this

So 4.1.25.0 is the version 1.25 of Docker API generated with Jane OpenAPI in a 4.X version.

You should always fix the version, or at least the 3 first numbers (4.1.25.*)
