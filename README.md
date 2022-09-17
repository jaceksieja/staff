# App for Staff

## Installation

1) Download project repository to your local directory:

```
git clone git@github.com:ergonode/backend.git
```

2) Open your terminal in local project, and execute:

```
make up
```

3) Login to php container, and execute:

```
make sh
```

4) Create the shema

```
bin/console doctrine:schema:create
```

## Usage

Endpoint:
```
https://localhost/sign-up
```

Body:
```
{
  "login": "TeSt",
  "password": "strongPassword",
  "position": "developer",
  "phoneNumber": "+48 123 456 789" 
}
```

Required header
```
Content-Type: application/json
```
