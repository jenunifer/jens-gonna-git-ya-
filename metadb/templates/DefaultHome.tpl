{extends file="Master.tpl"}

{block name=title}DBA METADB | Home{/block}

{block name=container}
<div class="modal hide fade" id="getStartedDialog">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">&times;</a>


	</div>
	<div class="modal-footer">
		
	</div>
</div>

<div class="container">

	<!-- Main hero unit for a primary marketing message or call to action -->
	<div class="hero-unit">
		<h3> DBA Metadb Site! <i class="icon-twitter-sign"></i></h3>
		<p>Up-to-date host and database information, DBA communication and links to other valuable DBA resources! This page will have outage, moratorium and lag notifications, shortly.</p>
		<p><a class="btn btn-primary btn-large" data-toggle="modal" href="#getStartedDialog">Dashboard coming soon! &raquo;</a></p>
	</div>
	<div class="row">
		<div class="span3">
			<h2><i class="icon-twitter-sign"></i> DBA Wiki Pages </h2>
			 <p>Can't find what you are looking for here?  Check out our team wiki pages!</p>
			<p><a class="btn" href="http://confluence.local.twitter.com/login.action?os_destination=%2Fdisplay%2FDBA%2FHome">go/DBA</a></p>
		</div>
		<div class="span3">
			<h2><i class="icon-th"></i> DBA Dashboard </h2>
			 <p> Viz charts to managed databases. </p>
			<p><a class="btn" href="http://dba-dashboard.twitter.biz/?aspect=Overview&cluster=adbil&datacenter=smf1&time_granularity=auto&time_span=hour-2&timezone=local">DBA Dashboard</a></p>
	 	</div>
		<div class="span3">
			<h2><i class="icon-twitter-sign"></i> Who's oncall </h2>
			<p> Manage oncall rotation and see who is coming up! </p>
			<p><a class="btn" href="https://tools.local.twitter.com/oncall">go/oncall</a></p>
		</div>
		<div class="span3">
			<h2><i class="icon-signin"></i> QUICK LINKS </h2>
			<p>The following are quick links to DBA resources:
		<p><a class="btn" href="http://nagios-dba.smf1.twitter.com/nagios/"> smf1-Nagios </a>
		<a class="btn" href="http://nagios-dba.atla.twitter.com/nagios/"> atla-Nagios </a></p>
		<p><a class="btn" href="https://docs.google.com/a/twitter.com/spreadsheet/ccc?key=0Ag1MUEnSKJKSdDVIcmprek1fWDljVkROVEFRTFlSSkE#gid=0"> Backup Schedule </a></p>
		<p><a class="btn" href="http://dashboard.smf1.twitter.com/"> Twitter.com dashboard </a></p>
			</p>
		</div>
	</div>

	<hr>

	<footer>
		<p>&copy; {$smarty.now|date_format:'%Y'} METADB</p>
	</footer>

</div> <!-- /container -->

{/block}
