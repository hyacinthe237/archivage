@include('pdfs.head', ['title' => 'Liste des Stagiaires PNFMV'])

<body bgcolor="#fff">
    <section style="margin:20px 40px;">

            <table width="100%" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td class="td-100 text-center bold" style="text-transform:uppercase;">
                      Liste des étudiants
                  </td>
                </tr>
              </tbody>
            </table>

      <table width="100%" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td class="td-5 bold text-center">#</td>
            <td class="td-10 bold text-center">Nom(s) et Prénom(s)</td>
            <td class="td-10 bold text-center">Email</td>
            <td class="td-5 bold text-center">Téléphone</td>
          </tr>
        </tbody>
      </table>

        @foreach ($etudiants as $item)
          <table width="100%" cellspacing="0" cellpadding="0">
            <tbody>
              <tr>
                <td class="td-5">{{ $item->number }}</td>
                <td class="td-10 text-wrap">{{ $item->firstname }} {{ $item->lastname }}</td>
                <td class="td-10 text-center text-wrap">{{ $item->email }}</td>
                <td class="td-5 text-center text-wrap">{{ $item->phone }}</td>
              </tr>
            </tbody>
          </table>
        @endforeach

    </section>

</body>
