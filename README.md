# App for Staff

## Installation

1) Download project repository to your local directory:

```
git clone git@github.com:jaceksieja/staff
```

2) Open your terminal in local project, and execute:

```
make up
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
