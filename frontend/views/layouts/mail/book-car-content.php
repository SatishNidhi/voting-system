<div style='background: #E01C28; color: white;' align='center'><h3>Book A car</h3></div>

<b>Dear Admin,</b><br><br>
<p>Someone has submitted form for booking a car.</p><br><br>
<p>The detail of the customer is given below:</p><br><br>

<div style="overflow: auto">
    <h2>Customer Detail: </h2>
    <p>
        <b>FullName:</b> <?= $model->fullname ?><br>
        <b>Mobile:</b> <?= $model->mobile_number ?><br>
        <b>Email:</b> <?= $model->email ?><br>
        <b>Book For:</b> <?= $model->book_for ?><br>
        <b>Car Model:</b> <?= $model->carModel->title ?><br>
        <b>Color:</b> <?= $model->carColor->title ?><br>
    </p>
</div>