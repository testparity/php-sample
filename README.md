<p align="center">
  <img src="https://testparity.com/brand/testparity-readme-banner.jpg" alt="TestParity" width="100%">
</p>

# PHP Sample

[![Parity Sample](https://github.com/testparity/php-sample/actions/workflows/parity.yml/badge.svg)](https://github.com/testparity/php-sample/actions/workflows/parity.yml)

This repository is an end-to-end Parity demo for plain PHP and PHPUnit. It runs the real PHPUnit suite, generates one Clover report per test file, and lets Parity prove which test owns each class.

## What this sample proves

`Calculator.php` reaches 80% when every test is combined, but `CalculatorTest.php` owns only 40%. `DiscountPolicyTest.php` supplies the other coverage by using calculator operations inside its own scenario.

| Source file | Belonging test | All tests | Belonging test | Attribution |
| --- | --- | ---: | ---: | ---: |
| `src/Calculator.php` | `tests/CalculatorTest.php` | 80% | 40% | `2|1` |
| `src/DiscountPolicy.php` | `tests/DiscountPolicyTest.php` | 100% | 100% | `1|0` |
| Project total | - | 85.71% | - | - |

`coverage-attribution` uses `total covering tests|non-matching covering tests`. The `2|1` result exposes cross-test coverage that a normal aggregate percentage cannot.

## How the proof works

The matching calculator test calls `add` and `subtract`. The discount test also calls `multiply` and `divide`, while `maximum` remains intentionally uncovered. `parity test` invokes each PHPUnit file separately with Xdebug Clover coverage, writes `.parity/per-test`, and runs `parity check` automatically.

## Run locally

Requirements: PHP 8.4+, Composer, and Xdebug with coverage support.

```bash
composer install
composer test
composer global require testparity/parity:^1.2
```

Generate fresh per-test evidence and check it:

```bash
parity test --config=parity.yaml --format=json
```

To inspect the same generated reports without rerunning PHPUnit:

```bash
parity check --config=parity.yaml --format=json
```

The expected result is `passed = true`, `global_coverage = 85.71`, and the file-level values shown above. No coverage fixture is committed.

## CI

GitHub Actions installs locked Composer dependencies, runs the complete PHPUnit suite, installs public `testparity/parity:^1.2`, and executes `parity test`. The generated `.parity/per-test` directory and JSON result are uploaded as the `parity-per-test-evidence` artifact for 14 days. No private token is required.
