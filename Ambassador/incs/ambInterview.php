<script src="/ambassador/js/ambInterview.js" type="text/javascript"></script>
<?php $rootpath = $_SERVER['DOCUMENT_ROOT']; ?>
<form class="generalForm generalFormBlock">
    <h2 class="caps black">Ambassador Interview</h2>
    <div class="textRight">
        <a class="textBtn" href="javascript:void(0)" onclick="javascript:openInterviewModal('', '<?php echo $AID; ?>');">Add Question / Answer +</a>
    </div>
    <br>

    <div id="questionsDiv">
        <?php include $rootpath . "/ambassador/incs/questions.php"; ?>
    </div>        
</form>

<div class="modalOverlay ambInterview hide">
    <div class="modalContainer">
        <div class="modalWindow ambInterview">
            <button class="modalClose">X</button>

            <div id="interviewModal" class="modalContent ambInterview hide">

            </div>
        </div>
    </div>
</div>


<script>
    $(document).on('click', '.modalOverlay.ambInterview, .modalClose, .navBg', function () {
        $('.modalContent.ambInterview').addClass('hide');
        $('.modalOverlay.ambInterview').addClass('hide');
    });

    document.addEventListener('keyup', function (e) {
        if (e.keyCode == 27) {
            $('.modalContent.ambInterview').addClass('hide');
            $('.modalOverlay.ambInterview').addClass('hide');
        }
    });

    $(document).on('click', '.modalWindow.ambInterview', function (e) {
        e.stopPropagation();
    });
</script>