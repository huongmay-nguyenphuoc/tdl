/* $('#addList').click(function (e) {
e.preventDefault();
$.post(
'apiToDo.php',
{
action: "createList",
userId: $('#userId').val(),
listTitle: $('#titleNewList').val()
},
function (idList) {
$.post(
'apiToDo.php',
{
action: "createList",
},
function (result) {
let data = JSON.parse(result);
$('#tableLists').append("lala");
}
)
},
'json'
)
});*/


/*ADD LISTE*/
$('#addList').click(function (e) {
e.preventDefault();
let userId = $('#userId').val();
let listTitle = $('#titleNewList').val();
let id = 1;

$('#tableLists').append('<article class="list"> <h3>' + listTitle +
        '</h3><ul id="' + id + '" class="listAFaire"></ul><form methode="post">' +
        '<input type="text" id="userId" hidden value="+ userId +">\n' +
        '<input type="text" id="titleTask" placeholder="Ajouter une tache">\n' +
        '<button class="addTask"> +</button>\n' +
        '</form>\n' +
    '</article>');
$('#titleNewList').val('');
});