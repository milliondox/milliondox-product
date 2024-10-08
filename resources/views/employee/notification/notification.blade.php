<div class="inner_notify">
                   <div class="notify_head">
                  <h2>Notification</h2>
                  <a href="#" id="mark-all-read">Mark all as read</a>
                  </div>  
                  <div class="main_ce_wrap">
<ul class="eployee-list">
 @forelse($empl_announcements as $announcement)
 @if($announcement->role == 'Employee') 
                    <li>
                      <div class="image_nt">
                        <div class="img_nt_wrap">
                      <img src="https://thumbs.dreamstime.com/b/red-admin-sign-pc-laptop-vector-illustration-administrator-icon-screen-controller-man-system-box-88756468.jpg" alt="Image Description">
                     </div>
                      </div>
                    <div class="title_des">
                    <span>Admin,</span><p> {{ ucfirst($announcement->announcements_for_employee) }} </p>
                     </div>
                      <div class="time_nt">
                      @if($announcement->created_at)
                      @php
                            $createdAt = $announcement->created_at;
                            $now = now();
                            $diffInSeconds = $now->diffInSeconds($createdAt);
                            if ($diffInSeconds < 60) {
                                $timeElapsed = $diffInSeconds . ' seconds ago';
                            } elseif ($diffInSeconds < 3600) {
                                $timeElapsed = floor($diffInSeconds / 60) . ' minutes ago';
                            } elseif ($diffInSeconds < 86400) {
                                $timeElapsed = floor($diffInSeconds / 3600) . ' hours ago';
                            } else {
                                $timeElapsed = floor($diffInSeconds / 86400) . ' days ago';
                            }
                        @endphp
                        <span>{{ $timeElapsed }}</span>
                        <span class="cliient">(employee)</span>
                    @endif
                       </div>
                    </li>
                      @endif 

                     @empty 
<!-- <li></li> -->
 @endforelse 
</ul> 
                        </div>
                   </div>

                   <script>
                    
                    document.addEventListener("DOMContentLoaded", function() {
                        document.getElementById("mark-all-read").addEventListener("click", function(event) {
                            event.preventDefault();
                
                            // Send an AJAX request to mark all announcements as read
                            fetch("{{ route('markAllAsRead') }}", {
                                method: "POST",
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                // Update counter
                                document.querySelector(".counter_list").textContent = "0";
                            })
                            .catch(error => console.error("Error:", error));
                        });
                    });
                
                
                                   </script>
