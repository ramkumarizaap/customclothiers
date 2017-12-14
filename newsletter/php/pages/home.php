<?php
$page_title = "Dashboard";
?>

<h2>Newsletter Dashboard</h2>

<hr />
<h3><span>Recent Newsletter Sends:</span></h3>


<div class="box">
	<table class="table table-hover table-responsive" role="table">
		<tr>
			<th>Send Date</th>
			<th>Email Subject</th>
			<th>Sent From</th>
			<th>Sent To</th>
			<th>Opened By</th> 
			<th>Unsubscribed</th>
			<th>Bounces</th>
			<th>Actions</th>
		</tr>
		<?php
		$past_sends = $newsletter->get_past_sends($db);
		$x=0;
		foreach($past_sends as $send){ 
			if($x++>5)break;
			$n = $newsletter->get_newsletter($db,$send['newsletter_id']);
			$send = $newsletter->get_send($db,$send['send_id']);
			?>
		<tr>
			<td>
				<?php echo date("Y-m-d H:i:s",$send['start_time']);?>
			</td>
			<td>
				<?php echo $n['subject'];?>
			</td>
			<td>
				&lt;<?php echo $n['from_name'];?>&gt; <?php echo $n['from_email'];?> 
			</td>
			<td>
				<?php echo count($send['sent_members']);?> members
			</td>
			<td>
				<?php echo count($send['opened_members']);?> members
			</td>
			<td>
				<?php echo count($send['unsub_members']);?> members
			</td>
			<td>
				<?php echo count($send['bounce_members']);?> members 
			</td>
			<td>
				<a href="?p=open&newsletter_id=<?php echo $n['newsletter_id'];?>">Open Newsletter</a> |
				<a href="?p=stats&newsletter_id=<?php echo $n['newsletter_id'];?>&send_id=<?php echo $send['send_id'];?>">View Stats</a>
			</td>
		</tr>
		<?php } ?>
		
	</table>
</div>

<hr />
<h3><span>Recent Members:</span></h3>



<div class="box">
	<table class="table table-hover table-responsive" role="table">
		<tr>
			<th>Email Address</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Join Date</th>
			<th>Number Sent</th>
			<th>Number Opened</th>
			<th>Number Bounces</th>
			<th>Groups</th>
			<th>Campaigns</th>
			<th>Actions</th>
		</tr>
		<?php
		$groups = $newsletter->get_groups($db);
		$members = $newsletter->get_members($db,false,true,5);
		$m = mysqli_fetch_assoc($members);
		foreach($members as $member){ 
		// while($m = mysqli_fetch_assoc($members)){ 
			$member = $newsletter->get_member($db,$member['member_id']);
			?>
		<tr>
				<td>
					<?php echo $member['email'];?>
				</td>
				<td>
					<?php echo _shl($member['first_name'],$search['name']);?>
				</td>
				<td>
					<?php echo _shl($member['last_name'],$search['name']);?>
				</td>
				<td>
					<?php echo $member['join_date'];?>
				</td>
				<td>
					<?php echo count($member['sent']);?> newsletters
				</td>
				<td>
					<?php echo count($member['opened']);?> newsletters
				</td>
				<td>
					<?php echo count($member['bounces']);?> times
				</td>
				<td>
					<?php
					$print = '';
					foreach($member['groups'] as $group_id){
						$print .=  '<a class="anchor" href="?p=groups&edit_group_id='.$group_id.'">';
						if(isset($search['group_id'][$group_id])){
							$print .= '<span style="background-color:#FFFF66">';
							$print .= $groups[$group_id]['group_name'];
							$print .= '</span>';
						}else{
							$print .= $groups[$group_id]['group_name']."";
						}
						$print .= '</a>,';
					}
					echo rtrim($print,",");
					?>
				</td>
				<td>
					<?php
					$print = '';
					foreach($member['campaigns'] as $campaign){
						$print .=  '<a class="anchor" href="?p=campaign_open&campaign_id='.$campaign['campaign_id'].'">';
						$print .= $campaign['campaign_name']."";
						$print .= '</a>,';
					}
					echo rtrim($print,",");
					?>
				</td>
				<td>
					
					<!-- 
					<a href="?p=members&edit_member_id=<?php// echo $member['member_id'];?>">Edit Member</a> | 
					<a href="?p=members&delete_member_id=<?php// echo $member['member_id'];?>" onclick="if(confirm('Really delete this member?'))return true;else return false;" style="color:#FF0000;">Delete</a>

					-->


					<a href="?p=members&edit_member_id=<?php echo $member['member_id'];?>" class="btn btn-small">
						<i class="fa fa-pencil-square-o"></i>
					</a>
					
					<a href="?p=members&delete_member_id=<?php echo $member['member_id'];?>" onclick="if(confirm('Really delete this member?'))return true;else return false;" class="btn btn-small">
						<i class="fa fa-trash-o"></i>
					</a>

				</td>
			</tr>
		<?php } ?>
		
	</table>
</div>



<h2><span>Pending Sends:</span></h2>

<div class="box">
	<table class="table table-hover table-responsive" role="table">
		<tr>
			<th>Newsletter</th>
			<th>Start Send</th>
			<th>Progress</th>
			<th>Action</th>
		</tr>
		<?php
		$sends = $newsletter->get_pending_sends($db);
		foreach($sends as $send){
			?>
			<tr>
				<td><?php echo $send['subject'];?></td>
				<td><?php echo $send['start_date'];?></td>
				<td><?php echo $send['progress'];?></td>
				<td><a href="?p=send&send_id=<?php echo $send['send_id'];?>">Continue Send</a></td>
			</tr>
			<?php
		}
		?>
	</table>
		
</div>