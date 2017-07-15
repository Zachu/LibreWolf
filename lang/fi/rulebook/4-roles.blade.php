<h1>Roolit</h1>
<p>Jokaiselle pelaajalle jaetaan pelin alkaessa rooli. Roolikortit kertovat roolin nimen (otsikko), mihin joukkueeseen pelaaja kuuluu (oikea yläkulma), mikä on pelaajan tavoite (leipäteksti) ja pelaajan mahdollisen erikoiskyvyn (lihavoitu teksti).</p>

<p>Pääsääntöisesti erikoiskykyjä käytetään pelin yö-vaiheessa pelinjohtajan avustuksella äänettömästi kommunikoiden. Jotkin erikoiskyvyt vaikuttavat vain tiettyinä öinä, mutta näistä huolehtii pelinjohtaja.</p>

<p>Mikäli peliin otetaan mukaan roolit Sairas, Ritari, Ihmissusipentu, Parrakas nainen, Susimies, Vanhus, Lapsi tai Yksinäinen susi, on pelinjohtajan pantava alussa merkille näiden roolien pelaajat. Nämä roolit eivät herää öisin, mutta rooleihin liittyy olennaisia asioita jotka pelinjohtajan on tiedettävä. Helpoin tapa on rooleihin jakamisen jälkeen kirjata pelinjohtajan aputaulukkoon kaikkien pelaajien roolit.</p>

<p>Alla on listattuna kaikki pelissä olevat roolit ja näiden kuvaukset, aivan kuten roolikorteissakin. Alla olevassa listauksessa on myös mahdollisia lisätietoja kyseisen roolin toiminnasta.</p>

<div class="page-break">
@foreach($roles as $role)
    @include('rulebook._role', ['role' => $role])
@endforeach
</div>
