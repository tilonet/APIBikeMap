1. Thema der Projektarbeit

 Maschinelle Bildkategorisierung mit Weboberfläche im Administrationsbereich und Aufbereitung der gewonnen Informationen als Bilduntertitel  


2. Geplanter Bearbeitungszeitraum
  
Beginn: ? 
Ende: ?

3. Beschreibung

 Der erste Eindruck lässt sich nicht korrigieren. Und genau dieser erste Eindruck ist sehr stark geprägt von Bildern. Ein falsch platziertes Bild und der potenzielle Kunde eines Ferienhauses ist verloren. 

 Ein Unternehmen wie tourist.online.de, mit 1 Millionen Ferienhausobjekten und 10 Bildern pro Objekt, steht vor dem großen Problem eine so große Menge an Bildern zu prüfen und zu verwalten. Eine Datenmenge, die manuell nicht zu bewältigen ist.

 Mein Projekt soll es ermöglichen, Bilder automatisiert zu verarbeiten. Zur Anwendung soll die Programmierschnittstelle (API) Cloud Vision von Google kommen. Diese ermöglicht es zu den Bildern mit Hilfe von maschinellem Lernen basierende Bilderkennung Labels zu generieren. Die erzeugten Labels sollen dann in einer separaten MySQL Datenbank gespeichert werden. Das Projekt beinhaltet eine Weboberfläche für Administratoren, um Bilder der Cloud Vison API zuführen zu können und die im JSON Format erhaltenen Ergebnisse in die Datenbank zu überführen. Des Weiteren Ergebnisbilder nach einzelnen Labels zu durchsuchen. Ein weiteres Ziel ist es, die gewonnenen Informationen dem Kunden darzustellen. In diesem Zusammenhang ist geplant Bildunterschriften aus den Labels automatisiert zu Erzeugen. Um dieses Ziel zu erreichen, soll eine weitere Programmierschnittstelle der Firma Ax Semantic zum Einsatz kommen, welche sich mit dem automatisierten Erzeugen von Texten befasst.  

 4. Umfeld

 Das Projekt wird in den Räumen der tourist-online-de GmbH in Münster durchgeführt. Mein Arbeitsplatz verfügt über die benötigten Resourcen für die Umsetzung und Testumgebung.

 5. Projektphasen mit Zeitplanung

 1.Projektplanung (9 Stunden)
 	1.1. Soll/Ist-Konzept ? (3 Stunden)
 	1.2. Konzeptionelles Datenbankdesign  (1 Stunde)
 	1.3  Logisches Datenbankdesign (2 Stunden)
 	1.4  Oberflächen Mockup ( 1 Stunde)
 	1.5  Evaluierung der benötigten API (2 Stunden)

 2. Programmierung (33 Stunden)

 	2.1 Grundlayout erstellen und Einbinden (5 Stunden)
 	2.2 Schnitstellen Verbindungen Einrichten (4 Stunden)
 	2.3 Datenbankanbindung einrichten (4 Stunden)
 	2.4 Request an Schnittstellen umsetzen (4 Stunden)
 	2.5 Ergebnis der Schnittstellen JSON verarbeiten (5 Stunden)
 	2.6 Auslesen der Daten aus der Datenbank (2 Stunden)
 	2.7 Suchlogik programmieren (5 Stunden)
 3. Test/ Fehlerbehebung (7 Stunden)

 4. Projektdokumentation (15 Stunden)