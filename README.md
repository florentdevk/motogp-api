# MotoGP API

REST API built with Symfony 8.1 and API Platform 4.3, exposing MotoGP 2026 season data: riders, teams, circuits and race results.

## Tech Stack

- **PHP 8.4** / **Symfony 8.1**
- **API Platform 4.3** (REST + JSON-LD / Hydra)
- **Doctrine ORM 3.6** / **PostgreSQL 16**
- **Docker** / **Docker Compose**
- **PHPUnit 13.2** (functional tests)
- **PHPStan 2.2** (level 6) / **PHP CS Fixer 3.95**
- **GitHub Actions** (CI/CD)

## Requirements

- Docker
- Docker Compose

## Installation

```bash
git clone https://github.com/florentdevk/motogp-api.git
cd motogp-api
docker compose up -d
docker compose exec php php bin/console doctrine:migrations:migrate --no-interaction
docker compose exec php php bin/console doctrine:fixtures:load --no-interaction
```

The API is available at `http://localhost:8000/api`.

## API Endpoints

| Resource | Endpoint |
|---|---|
| Riders | `GET /api/riders` |
| Teams | `GET /api/teams` |
| Circuits | `GET /api/circuits` |
| Races | `GET /api/races` |
| Race Results | `GET /api/race_results` |

## Filters & Pagination

### Riders
```
GET /api/riders?nationality=Spanish
GET /api/riders?name=Marc
GET /api/riders?order[number]=asc
GET /api/riders?page=2
GET /api/riders?itemsPerPage=10
```

### Circuits
```
GET /api/circuits?country=Spain
GET /api/circuits?order[length]=desc
```

### Races
```
GET /api/races?season[gte]=2026
GET /api/races?order[date]=asc
```

## Running Tests

```bash
docker compose exec php php vendor/bin/phpunit
```

## Code Quality

```bash
# Static analysis
docker compose exec php vendor/bin/phpstan analyse --memory-limit=512M

# Code style
docker compose exec php vendor/bin/php-cs-fixer fix --dry-run
```

## Data

Fixtures include real 2026 MotoGP season data:
- **22 riders** across all factory and satellite teams
- **11 teams** (Ducati Lenovo, Aprilia Racing, Monster Energy Yamaha, etc.)
- **22 circuits** (Buriram, Mugello, Silverstone, etc.)
- **22 races** (full 2026 calendar)