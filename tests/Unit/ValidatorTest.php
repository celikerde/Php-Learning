<?php

use Core\Validator;

it('it validates a string of a minimum length', function () {
    expect(Validator::string('foobar', 3))->toBeTrue(); // inline expect
    expect(Validator::string('f', 3))->toBeFalse(); // inline expect
});

it('validates an email address', function () {
    expect(Validator::email('testmail.com'))->toBeFalse();
    expect(Validator::email('testmail@example.com'))->toBeTrue();
});

it('validates greater than a given amount', function () {
    expect(Validator::greaterThan(10, 20))->toBeFalse();
    expect(Validator::greaterThan(8, 10))->toBeFalse();
    expect(Validator::greaterThan(10, 9))->toBeTrue();
    expect(Validator::greaterThan(2, 2))->toBeFalse();
    expect(Validator::greaterThan(2, 1))->toBeTrue();
})->only();