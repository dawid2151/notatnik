Notanik
<img width="1626" height="592" alt="obraz" src="https://github.com/user-attachments/assets/43329009-725f-4ff3-94fa-a5a9c9604239" />


Aplikacja zbudowana na frameworku yii2, za front end odpowiada bootstrap.
- Wprowadzone są odpowiednie zabezpieczenia - aby korzystać z aplikacji trzeba się zalogować, dostęp anonimowy jest jedynie dla strony 'O nas'
- Dodano nowe modele i viewmodele (dla notatek)
- Obsłużono nowe endpointy w kontrolerze
- Notatki zapisywane są w sesji użytkownika
- Użytkownik ma możliwość usuwania notatek

Problemy/spostrzeżenia na które natrafiłem podczas developmentu:
- Polskie znaki nie były obsługiwane pomimo ustawienia charset="utf-8" - okazało się że pliki projektu domyślnie były zapisywane z enkodowaniem Windows 1250
- Przechowywanie wartości statycznych w aplikacji - w yii wartości statyczne zamykają się w obrębie jednego requestu, ponieważ w apache requesty obsługiwane są przez specjalnie tworzone wątki robocze, nie istnieje jeden proces który przechowywałby pamięć statyczną
- Renderowanie customowych formularzy za pomocą tagów html - nie byłem w stanie odpowiednio połączyć customowo napisanego formularza z endpointem, koniec końców zbudowałem formularz analogicznie do formularza logowania (przy użyciu metod pomocniczych)
- Endpointy obsługują zarówno metody POST i GET - szczególny impact ma to podczas obsługi formularzy, gdzie w metodzie GET chcę zwrócić view z pustym formularzem, a w metodzie POST chcę jedynie operować na przesłanych danych
