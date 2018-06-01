# pruefung-maltevogt-dekra

## Start in terminal

- Run containers: `$ docker-compose up -d`
- Open http://localhost in browser
- Stop containers: `$ docker-compose stop`

## MySQL Tools

- [HeidiSQL for Windows](https://www.heidisql.com/)
- [SequelPro for macOS](https://sequelpro.com/)

## MySQL Credentials

- Windows - Host: 192.168.99.100, User: db, Password: db: Database: db
- macOS - Host: 127.0.0.1, User: db, Password: db: Database: db

## Usage

### Main menu:
- CMS: Home
- Kundendaten: Create, edit or delete costumer-data
- Kunden-Kategorien: Create, edit or delete costumer-categories

### Steps:
- Go on (http://localhost/kundenkategorie.php)
- Create customer-categories by clicking "Anlegen" (ID will be selected automatically)
- Edit or Delete customer-categories if needed by clicking "Bearbeiten" or "Löschen"
- Go on (http://localhost/index.php)
- Create a new customer-data-file by clicking "Anlegen"
- Fill in all fields and select a category you created earlier
- Click "Anlegen" to create new data
- Edit or Delete customer-data if needed by clicking "Bearbeiten" or "Löschen"