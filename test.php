<div class="modal">
    <p class="liTaskStart"><?= $task['start'] ?></p>
    <textarea class="liTaskDesc" placeholder="Dis-m'en plus ..."></textarea>
    <input type="checkbox" class="liTaskFinish">
</div>

/*UPDATE TITRE*/
$('body').on('click', '.liTask .liTaskTitle', function () {
$(this).replaceWith($('<input type="text" class="liTaskTitle" placeholder="'+ this.innerHTML + '">'));

});
CLIQUE SUR LI
cherche infos


if ($(this).val.length != 0 ) {
let newTitle = $(this).val();
let inputTitle = $(this);
console.log(newTitle);
$.post(
'apiToDo.php',
{
action: "updateTitle",
idTask: idTask,
newTitle: newTitle
},
function (result) {
$(inputTitle).val(newTitle);
$(inputTitle).attr("placeholder", newTitle);
});
}

$('body').on('click', '.liTaskTitle', function () {
let thisTitle = $(this).find('.liTaskTitle').val();

$('body').on('change', '.liTask .liTaskTitle', function () {
if ($(this).val().length >=1) {
let newTitle = $(this).val();
console.log(newTitle);
} else {

}
});


/* let liTask = $(this).parents('li');
let idTask = $(this).parents('li').attr('id');
let textarea = $(liTask).find('.liTaskDesc');
let description = $(liTask).find('.liTaskDesc').val();
$.post(
'apiToDo.php',
{
action: "addDescription",
idTask: idTask,
description: description
},
function (result) {
$(textarea).text(description);
});*/
});
/*
$('body').on('change', '.liTask .liTaskTitle', function () {
if ($(this).val().length >=1) {
let newTitle = $(this).val();
console.log(newTitle);
} else {

}
});*/


$('.liTask').on('click', '.liTaskTitle', function () {
let thisTitle = this;
let oldTitle = $(this).val();
$(thisTitle).attr("readonly", false);
$(thisTitle).css('cursor', 'text');

$(thisTitle).change(function () {
if ($(thisTitle).val().length >= 1) {
let newTitle = $(this).val();
// console.log(newTitle);
$.post(
'apiToDo.php',
{
action: "updateTitle",
idTask: idTask,
newTitle: newTitle
},
function (result) {
$(thisTitle).val(newTitle);
$(thisTitle).attr("placeholder", newTitle);
});
}
});
});