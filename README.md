# 16PL-procedural-site

Grupas 16PL kopejais darbs. 

**Uzdevums:** izveidot parauga saitu, izmantojot plain PHP pieeju.

---

###### UPDATE: June 12, 2013 6:42 PM
## Uzdevumi grupai
0. Izveidot *friendly*-adreses
1. Attēlot lietotāju CSV kā html tabulu, ņemot datus no DB. Ja jau ir lietotāju CSV saraksts, izveidot *import* skriptu, kurš varētu atjaunot lietotāju sarakstu. Skriptam ir jābūt:
	* draudzīgai adresei **/import-users/**
	* augšupielādes formai
	* spējai atjaunot esošos lietotājus un pievienot jaunus, atkarībā no tā, vai CSV faila dati pārklājas ar DB lietotāju tabulu.
2. Izveidot rakstu ( *articles* ) attēlošanu pienācīgā veidā, ar komentāriem katram rakstam:
	* Rakstu saraksts
	* Atsevišķa raksta attēlošana ar komentāriem un komentēšanas formu
	* Komentāra pievienošana
3. Administrācijas daļa:
	* *friendly*-adrese **/admin/**
	* Ieeja ar lietotājvārdu un paroli, datus ņemam no DB
	* Sesiju nodrošināšana
	* Rakstu saraksts un rediģēšana
	* Lietotāju saraksts un rediģēšana

---

###### UPDATE: June 14, 2013 5:09 PM
## Kā tas strādā?

Failu struktūra ir šāda:

	.
	├── README.md
	├── conf
	│   └── conf.php
	├── contr
	│   └── userlist.php
	├── data
	│   └── users.csv
	├── func
	│   ├── db.php
	│   └── tpl.php
	├── index.php
	└── views
	   ├── main.html
	   └── users.html

Lietotājs vienmēr vaicā failu *index.php*.

HTTP vaicājumam var pievienot `?section=nosaukums`, kur nosaukums ir kāda direktorijas `contr/` faila vārds, piem., `userlist`.

Fails *index.php* pieslēdz kontrolieri no direktorijas `contr/` ar vārdu `$_GET['section']`.

Priekšskatījuma fails `views/main.html`, izmantojot mainīgos `$header`, `$article`, `$nav`, `$footer` un PHP funkciju `require_once()`, vajadzīgajās vietās ielādē attiecīgo *view*-failu. Mainīgajos ir jānorāda *view*-faila nosaukums bez paplašinājuma, bet *view*-failam ir fiksēts paplašinājums `.html`.