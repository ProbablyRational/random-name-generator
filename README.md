# Random Name Generator
A PHP library to create interesting, sometimes entertaining, random names.
Based on [nubs/random-name-generator](https://github.com/nubs/random-name-generator)!

This fork will be maintained with adinitial generators intended for duct.me

[![Latest Stable Version](http://img.shields.io/packagist/v/nubs/random-name-generator.svg?style=flat)](https://packagist.org/packages/nubs/random-name-generator)
[![Total Downloads](http://img.shields.io/packagist/dt/nubs/random-name-generator.svg?style=flat)](https://packagist.org/packages/nubs/random-name-generator)
[![License](http://img.shields.io/packagist/l/nubs/random-name-generator.svg?style=flat)](https://packagist.org/packages/nubs/random-name-generator)

## Requirements
This library requires PHP 5.6, or newer.

## Installation
This package uses [composer](https://getcomposer.org) so you can just add
`nubs/random-name-generator` as a dependency to your `composer.json` file or
execute the following command:

```bash
composer require probablyrational/random-name-generator
```

## Generators

### All
The "all" generator will utilize all other configured generators to generate
random names.  It will select from the list of generators randomly and then
use them to generate a random name using their functionality.

#### Usage
```php
$generator = \ProbablyRational\RandomNameGenerator\All::create();
echo $generator->getName();
```

Alternatively, if you want to configure/build the generators to use instead of
using all of the available generators, you can construct them yourself:

```php
$generator = new \ProbablyRational\RandomNameGenerator\All(
    [
        new \ProbablyRational\RandomNameGenerator\Alliteration(1),
        new \ProbablyRational\RandomNameGenerator\Vgng(1),
        new \ProbablyRational\RandomNameGenerator\Sketch(1)
    ]
);
```

### Video Game Names
The video game name generator is based off of [prior](http://videogamena.me/)
[art](https://github.com/nullpuppy/vgng).  It will generate unique names based
off of "typical" video games.

#### Examples
* *Kamikaze Bubblegum Warrior*
* *Rockin' Valkyrie Gaiden*
* *Neurotic Jackhammer Detective*
* *My Little Mountain Climber Conflict*
* *Small-Time Princess vs. The Space Mutants*

You can also use [this web example](http://sam.sbat.com/) to see more example
video game names generated by this library.

#### Usage
```php
$generator = new \ProbablyRational\RandomNameGenerator\Vgng(1);
echo $generator->getName();
```

## Alliterative Names
The sketchy name generator is based off of a server called [verylegit](https://github.com/defaultnamehere/verylegit.link).

#### Examples
* *Agreeable Anaconda*
* *Disturbed Duck*
* *Misty Meerkat*
* *Prickly Pig*

#### Usage
```php
$generator = new \ProbablyRational\RandomNameGenerator\Alliteration(1);
echo $generator->getName();
```

## Sketchy Names
The alliteration name generator is based off of a list of
[adjectives](http://grammar.yourdictionary.com/parts-of-speech/adjectives/list-of-adjective-words.html)
and a list of [animals](https://animalcorner.co.uk/animals/).

#### Examples
* *Verification-safe.com2Fcryptolocker.js3Fauthorize=action*
* *Facebook.com2Ftrojan.gp3Fjava0day=x64*
* *Google.com2Fpccleaner.rar3Fpassword=pccleaner*
* *Appleeid-apple.com2Fwebcam.gp3Flogin=ip-camera*

#### Usage
```php
$generator = new \ProbablyRational\RandomNameGenerator\Sketch(1);
echo $generator->getName();
```

## License
random-name-generator is licensed under the MIT license.  See
[LICENSE](LICENSE) for the full license text.
