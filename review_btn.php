<!-- The Review Button which will be added to an individual page IF the user is logged into an account. -->
<form name="writeReviewForm" action="write_review.php" method="POST">
    <!--  Log in Button -->
    <div class="my-3 d-grid px-3 text-white">
        <input type="hidden" name="location_name" value="<?php echo $rowInfo['name'] ?>">
        <input type="hidden" name="location_id" value="<?php echo $rowInfo['id'] ?>">
        <input type="submit" class="btn btn-warning btn-block btn-signup" aria-label="Write a Review Button" value="Write a Review">
        </input>
    </div>
</form>