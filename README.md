# KZtest
Platforma za testiranje instruktora zdravlja

Ovaj program je pre svega osmišljen da bude glavni test za intruktore zdravlja. Ovaj program nije u mogućnosti da potpuno spreči varanje u testu, ali administratoru omogućuje da veoma lako prepozna ukoliko to neko pokuša da učini. Pošto u vreme pisanja ovog programa broj polaznika tog kursa nije bio prekomerno velik, za administratora ne bi bilo opterećenje da prekontroliše poslate odgovore i potvrdi da li je ispravno urađen test ili je bilo malverzacija.
Ovaj program može pre svega da se razvija u tom pravcu da se napravi platforma za unos pitanja i odgovora (najverovatnije bih se tom prilikom poslužio delom koda programa TestMe 1.5), a do sada su pitanja importovana iz OpenOffice-a kroz PHPMyAdmin. Osim toga ima mogućnost da se proširi i admin panel za praćenje aktivnosti na sajtu osoba koje pokušavaju da sa drugačijim podacima više puta pokušaju da urade test.
Mogućnosti ovog programa:
- Testiranje vašeg znanja kroz zadavanje predodređenih pitanja od strane koordinatora testa
- Vreme je ograničeno a moguće je probati tri puta, s tim da ukoliko treći put bude falilo malo do prolaza, zadaju se 5 dodatnih pitanja na koja se mora odgovoriti sa 100% tačnosti
- Moguća su pitanja sa jednim tačnim odgovorom, sa više tačnih odgovora i pitanja gde trebaju da se popune polja (jedna ili više)
- Admin panel omogućava da se prekontroliše aktivnost svih posetioca ovog programa, njihove IP adrese, osnovne informacije, na kojoj stranici su šta uradili, sve kako bi se smanjila mogućnost da se napravi neka malverzacija.
- Ovaj program je u izvesnoj meri automatizovan, ali ipak zahteva kontakt sa koordinatorom testa kako bi: dobio dnevnu šifru za pristup testu, ugovorio polaganje testa, saznao za dalje informacije (zavisno od ishoda testa) i drugo.

Nadam se da će ovaj program biti nekome od koristi.
