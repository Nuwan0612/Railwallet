<?php require APPROOT . '/views/admin/includes/header.php';?>


  <div class="deatails">
    <div class="all-trains">

      <div class="head">
        <div class="title">Ticket Prices</div>
        <a href="<?php echo URLROOT; ?>admins/addTickets"><button class="add-train">Add</button></a>
      </div>

      <div class="search-bar-outer-container">
        <div class="search-bar-inner-container">
          <div class="search-bar">
            <input type="text" class="border-search" id="search-ticket" placeholder="Enter Ticket ID">
            <button class="search-button" onclick="searchTicket()">
              <i class="fas fa-search"></i>
            </button> 
          </div>
        </div>
        
        <div class="hide-outer-container">
        <a class="links" href="<?php echo URLROOT;?>admins/unavailbleTickets"><button class="delete-btn">Unavailable Tickets</button></a>
        </div>  
      </div>

      <div class="detail-body">
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Ticket ID</th>
                <th>Departure station</th>
                <th>Arival station</th>
                <th>Class</th>
                <th>Price (Rs.)</th>
                <th>QR Code</th>
                <th>Options</th>
              </tr>
            </thead>
            
            <tbody>
            <?php $rowNumber = 1; foreach($data['tickets'] as $ticket):?>
            <tr>
              <td><?php echo $rowNumber; ?></td>
              <td><?php echo $ticket->ticketPriceID; ?></td>
              <td><?php echo $ticket->departureStationName; ?></td>
              <td><?php echo $ticket->arrivalStationName; ?></td>
              <td><?php echo $ticket->className; ?></td>
              <td><?php echo $ticket->price; ?></td>
              <td><img class="qrCode" src="<?php echo URLROOT;?>/qrCodes/<?php echo $ticket->qrCode; ?>" alt=""></td>
              <td>
                <div class="options">
                <a href="<?php echo URLROOT; ?>admins/editTicket/<?php echo $ticket->ticketPriceID; ?>"><button class="edit-btn">Edit</button></a>
                  <form action="<?php echo URLROOT; ?>admins/disableTicektAvalability/<?php echo $ticket->ticketPriceID?>" method ="post"><input class="delete-btn" type="submit" value="Not use"></form>
                </div> 
              </td>
            </tr>
            <?php $rowNumber++; endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>  
    </div>
  </div>

<?php require APPROOT . '/views/admin/includes/footer.php';?>
