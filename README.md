# Marshmallow Validation

Marshmallow Validation is an extension library for Laravel's own validation
system. The package adds rules to validate data like IBAN, BIC, ISBN,
creditcard numbers and more.

[![Latest Version](https://img.shields.io/packagist/v/marshmallow/validation.svg)](https://packagist.org/packages/marshmallow/validation)
[![Monthly Downloads](https://img.shields.io/packagist/dm/marshmallow/validation.svg)](https://packagist.org/packages/marshmallow/validation/stats)

> [!important]
> This package was originally forked from [intervention/validation](https://github.com/Intervention/validation). Since we were making many opinionated changes and the owner archived the repository, we decided to continue development in our own version rather than submitting pull requests that might not benefit all users of the original package. You're welcome to use this package, we're actively maintaining it. If you encounter any issues, please don't hesitate to reach out.

## Installation

You can install this package quick and easy with Composer.

Require the package via Composer:

    $ composer require marshmallow/validation

## Laravel integration

The Validation library is built to work with the Laravel Framework (>=10). It
comes with a service provider, which will be discovered automatically and
registers the validation rules into your installation. The package provides 30
additional validation rules including multi language error messages, which can
be used like Laravel's own validation rules.

```php
use Illuminate\Support\Facades\Validator;
use Marshmallow\Validation\Rules\Creditcard;
use Marshmallow\Validation\Rules\Hexadecimalcolor;
use Marshmallow\Validation\Rules\Username;

$validator = Validator::make($request->all(), [
    'color' => new Hexadecimalcolor([3, 6]), // pass rule as object
    'number' => ['required', 'creditcard'], // or pass rule as string
    'name' => 'required|min:3|max:20|username', // combining rules works as well
]);
```

### Changing the error messages:

Add the corresponding key to `/resources/lang/<language>/validation.php` like this:

```php
// example
'iban' => 'Please enter IBAN number!',
```

Or add your custom messages directly to the validator like [described in the docs](https://laravel.com/docs/10.x/validation#manual-customizing-the-error-messages).

## Available Rules

The following validation rules are available with this package.

### Base64 encoded string

The field under validation must be [Base64 encoded](https://en.wikipedia.org/wiki/Base64).

    public Marshmallow\Validation\Rules\Base64::__construct()

### Business Identifier Code (BIC)

Checks for a valid [Business Identifier Code](https://en.wikipedia.org/wiki/ISO_9362) (BIC).

    public Marshmallow\Validation\Rules\Bic::__construct()

### Camel case string

The field under validation must be a formated in [Camel case](https://en.wikipedia.org/wiki/Camel_case).

    public Marshmallow\Validation\Rules\Camelcase::__construct()

### Classless Inter-Domain Routing (CIDR)

Check if the value is a [Classless Inter-Domain Routing](https://en.wikipedia.org/wiki/Classless_Inter-Domain_Routing) notation (CIDR).

    public Marshmallow\Validation\Rules\Cidr::__construct()

### Creditcard Number

The field under validation must be a valid [creditcard number](https://en.wikipedia.org/wiki/Payment_card_number).

    public Marshmallow\Validation\Rules\Creditcard::__construct()

### Data URI scheme

The field under validation must be a valid [Data URI](https://en.wikipedia.org/wiki/Data_URI_scheme).

    public Marshmallow\Validation\Rules\DataUri::__construct(?array $media_types = null)

### Domain name

The field under validation must be a well formed [domainname](https://en.wikipedia.org/wiki/Domain_name).

    public Marshmallow\Validation\Rules\Domainname::__construct()

### European Article Number (EAN)

Checks for a valid [European Article Number](https://en.wikipedia.org/wiki/International_Article_Number).

    public Marshmallow\Validation\Rules\Ean::__construct(array $lengths = [8, 13])

#### Parameters

**length**

Optional integer length (8 or 13) to check only for EAN-8 or EAN-13.

### Global Trade Item Number (GTIN)

Checks for a valid [Global Trade Item Number](https://en.wikipedia.org/wiki/Global_Trade_Item_Number).

    public Marshmallow\Validation\Rules\Gtin::__construct(array $lengths = [8, 12, 13, 14])

#### Parameters

**length**

Optional array of allowed lengths to check only for certain types (GTIN-8, GTIN-12, GTIN-13 or GTIN-14).

### Hexadecimal color code

The field under validation must be a valid [hexadecimal color code](https://en.wikipedia.org/wiki/Web_colors).

    public Marshmallow\Validation\Rules\Hexadecimalcolor::__construct(array $lengths = [3, 4, 6, 8])

#### Parameters

**length**

Optional length as integer to check only for shorthand (3 or 4 characters) or full hexadecimal (6 or 8 characters) form.

### Text without HTML

The field under validation must be free of any html code.

    public Marshmallow\Validation\Rules\HtmlClean::__construct()

### International Bank Account Number (IBAN)

Checks for a valid [International Bank Account Number](https://en.wikipedia.org/wiki/International_Bank_Account_Number) (IBAN).

    public Marshmallow\Validation\Rules\Iban::__construct()

### International Mobile Equipment Identity (IMEI)

The field under validation must be a [International Mobile Equipment Identity](https://en.wikipedia.org/wiki/International_Mobile_Equipment_Identity) (IMEI).

    public Marshmallow\Validation\Rules\Imei::__construct()

### International Standard Book Number (ISBN)

The field under validation must be a valid [International Standard Book Number](https://en.wikipedia.org/wiki/International_Standard_Book_Number) (ISBN).

    public Marshmallow\Validation\Rules\Isbn::__construct(array $lengths = [10, 13])

#### Parameters

**length**

Optional length parameter as integer to check only for ISBN-10 or ISBN-13.

### International Securities Identification Number (ISIN)

Checks for a valid [International Securities Identification Number](https://en.wikipedia.org/wiki/International_Securities_Identification_Number) (ISIN).

    public Marshmallow\Validation\Rules\Isin::__construct()

### International Standard Serial Number (ISSN)

Checks for a valid [International Standard Serial Number](https://en.wikipedia.org/wiki/International_Standard_Serial_Number) (ISSN).

    public Marshmallow\Validation\Rules\Issn::__construct()

### JSON Web Token (JWT)

The given value must be a in format of a [JSON Web Token](https://en.wikipedia.org/wiki/JSON_Web_Token).

    public Marshmallow\Validation\Rules\Jwt::__construct()

### Kebab case string

The given value must be formated in [Kebab case](https://en.wikipedia.org/wiki/Letter_case#Special_case_styles).

    public Marshmallow\Validation\Rules\Kebabcase::__construct()

### Lower case string

The given value must be all lower case letters.

    public Marshmallow\Validation\Rules\Lowercase::__construct()

### Luhn algorithm

The given value must verify against its included [Luhn algorithm](https://en.wikipedia.org/wiki/Luhn_algorithm) check digit.

    public Marshmallow\Validation\Rules\Luhn::__construct()

### Media (MIME) type

Checks for a valid [Mime Type](https://en.wikipedia.org/wiki/Media_type) (Media type).

    public Marshmallow\Validation\Rules\MimeType::__construct()

### Postal Code

The field under validation must be a [postal code](https://en.wikipedia.org/wiki/Postal_code) of the given country.

    public Marshmallow\Validation\Rules\Postalcode::__construct(array $countrycodes = [])

#### Parameters

**countrycode**

Country code in [ISO-639-1](https://en.wikipedia.org/wiki/ISO_639-1) format.

### Postal Code (static instantiation)

    public static Marshmallow\Validation\Rules\Postalcode::countrycode(array $countrycodes): Postalcode

#### Parameters

**countrycode**

Country code in [ISO-639-1](https://en.wikipedia.org/wiki/ISO_639-1) format.

### Postal Code (static instantiation with reference)

    public static Marshmallow\Validation\Rules\Postalcode::reference(string $reference): Postalcode

#### Parameters

**reference**

Reference key to get [ISO-639-1](https://en.wikipedia.org/wiki/ISO_639-1) country code from other data in validator.

### Semantic Version Number

The field under validation must be a valid version numbers using [Semantic Versioning](https://semver.org/).

    public Marshmallow\Validation\Rules\SemVer::__construct()

### SEO-friendly short text (Slug)

The field under validation must be a user- and [SEO-friendly short text](https://en.wikipedia.org/wiki/Clean_URL#Slug).

    public Marshmallow\Validation\Rules\Slug::__construct()

### Snake case string

The field under validation must formated as [Snake case](https://en.wikipedia.org/wiki/Snake_case) text.

    public Marshmallow\Validation\Rules\Snakecase::__construct()

### Title case string

The field under validation must formated in [Title case](https://en.wikipedia.org/wiki/Title_case).

    public Marshmallow\Validation\Rules\Titlecase::__construct()

### Universally Unique Lexicographically Sortable Identifier (ULID)

The field under validation must be a valid [Universally Unique Lexicographically Sortable Identifier](https://github.com/ulid/spec).

    public Marshmallow\Validation\Rules\Ulid::__construct()

### Upper case string

The field under validation must be all upper case.

    public Marshmallow\Validation\Rules\Uppercase::__construct()

### Username

The field under validation must be a valid username. Consisting of alpha-numeric characters, underscores, minus and starting with a alphabetic character. Multiple underscore and minus chars are not allowed. Underscore and minus chars are not allowed at the beginning or end.

    public Marshmallow\Validation\Rules\Username::__construct()

## Development & Testing

With this package comes a Docker image to build a test suite container. To build this container you have to have Docker installed on your system. You can run all tests with this command.

    $ docker-compose run --rm --build tests

## License

Marshmallow Validation is licensed under the [MIT License](http://opensource.org/licenses/MIT).
