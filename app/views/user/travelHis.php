<?php require APPROOT . '/views/user/includes/header.php'; ?>



                    
                    <div class="travel-content">
                    <div class="travel-details">
                        <div class="title">
                        <!-- <i class='bx bx-history'></i> -->
                            <h2>Travel History</h2>
                            <!-- <a href="#" class="btn">View All</a> -->
                        </div>
                        <div class="table-details">
                                
                        <table>
                            <tr>
                                <th>Booking ID</th>
                                <th>Booking Time</th>
                                <th>Departure Date</th>
                                <th>Departute Station</th>
                                <th>Departute Time</th>
                                <th>Arrival Station</th>
                                <th>Arrival Time</th> 
                            </tr>
                            <?php foreach ($data['tickets'] as $tickets): ?>                             
                            <tr>
                            <input type="hidden" name="booking_id" value="<?= $tickets->bookingId ?>">
                                <td><?php echo $tickets->bookingId; ?></td>
                                <td><?php echo $tickets->bookingTime; ?></td>
                                <td><?php echo $tickets->departureDate; ?></td>
                                <td><?php echo $tickets->depStation; ?></td>
                                <td><?php echo $tickets->departureTime; ?></td>
                                <td><?php echo $tickets->arrStation ?></td>
                                <td><a href="<?php URLROOT ?>viewTicketByBookingId/<?php echo $tickets->bookingId?>"><button type="sumbit">View Ticket</button></a></td>
                                
                                <?php endforeach; ?>
                            </tr>
                            
                        </table>
                        </div>
                        
                    </div>
                    
 <?php require APPROOT . '/views/user/includes/footer.php';?>  