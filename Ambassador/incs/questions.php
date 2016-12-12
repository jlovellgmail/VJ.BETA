<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include_once($rootpath.'/classes/Ambassador.class.php');

if (!isset($Ambassador))
{
	if (!isset($AID) || $AID == '')
	{
		$AID = $_GET['AID'];
	}
	$Ambassador = new Ambassador();
	$Ambassador->initialize($AID);
}

$questions = $Ambassador->getQuestions();
?>

<ol class="questionAnswerArea sortableList" id="sortableQnA">
    <?php $count = 0;
		foreach ($questions as $quest) {
			$QID = $quest->getVar('QID');
			$AID = $quest->getVar('AID');
			$Question = $quest->getVar('Question');
		    $Answer = $quest->getVar('Answer'); 
			$count++; ?>
			<div name="quest" id="<?php echo $QID; ?>">
				<li class="questionAnswerEntry ui-state-default">
			        <div class="question"><?php echo $Question; ?></div>
			        <div class="answer"><?php echo $Answer; ?></div>
			        <div class="qnaEditLink"><a href="javascript:openInterviewModal('<?php echo $QID; ?>', '<?php echo $AID; ?>');">Edit</a><br>
			            <a href="javascript:delAmbQuestion('<?php echo $QID; ?>', '<?php echo $AID; ?>')">Delete</a></div>
			    </li>
			</div><?php
		} 
		if ($count == 0)
		{
			echo "<div class='alertMessage textCenter'>No Questions/Answers have been created.</div>";
		}?>
</ol>

<script>
//jQuery UI Required
$(function() {
	$( "#sortableQnA" ).sortable().bind('sortupdate', function() {
		sortQuest();
	});;
});
</script>