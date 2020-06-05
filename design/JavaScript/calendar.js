function setStyle(id,style,value)
{
    id.style[style] = value;
}

function calendrier()
{
    var date = new Date();
    var jour = date.getDate();
    var mois = date.getMonth();
    var annee = date.getFullYear();

    if(annee <= 200)
    {
        annee += 1900;
    }

    var listeMois = ['Janvier', 'Férier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    var joursMois = [31,28,31,30,31,30,31,31,30,31,30,31];

    if(annee % 4 === 0 && annee !== 1900)
    {
        joursMois[1] = 29;
    }

    var total = joursMois[mois];
    var dateAujourdui = jour + ' ' + listeMois[mois] + ' ' + annee;
    let dateJour = date;
    dateJour.setDate(1);

    if(dateJour.getDate() === 2)
    {
        dateJour = dateJour.setDate(0);
    }

    dateJour = dateJour.getDay();
    document.write('<table class="calendrier" ><tbody id="calendrierBody"><tr><th colspan="7">'+ dateAujourdui +'</th></tr>');
    document.write('<tr class="calendrierJourSemaines"><th>Dim</th><th>Lun</th><th>Mar</th><th>Mer</th><th>Jeu</th><th>Ven</th><th>Sam</th></tr><tr>');
    var semaine = 0;

    for(i=1;i<=dateJour;i++)
    {
        document.write('<td class="calendrierJour">'+ (joursMois[mois-1] - dateJour + i) +'</td>');
        semaine++;
    }
    for(i=1;i<=total;i++)
    {
        if(semaine === 0)
        {
            document.write('<tr>');
        }
        if(jour === i)
        {
            document.write('<td class="calendrierAuj">'+ i +'</td>');
        }
        else
        {
            document.write('<td>'+ i +'</td>');
        }
        semaine++;
        if(semaine === 7)
        {
            document.write('</tr>');
            semaine = 0;
        }
    }

    for(var i = 1; semaine !== 0; i++)
    {
        document.write('<td class="calendrierJour">'+i+'</td>');
        semaine++;
        if(semaine === 7)
        {
            document.write('</tr>');
            semaine = 0;
        }
    }
    document.write('</tbody></table>');

    return true;
}