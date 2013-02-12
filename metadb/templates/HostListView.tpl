{extends file="Master.tpl"}

{block name=title}DBA METADB | Hosts{/block}

{block name=customHeader}
<script type="text/javascript">
	$LAB.script("bootstrap/js/bootstrap-datepicker.js")
	.script("bootstrap/js/bootstrap-timepicker.js")
	.script("bootstrap/js/bootstrap-combobox.js")
	.script("scripts/libs/underscore-min.js").wait()
	.script("scripts/libs/underscore.date.min.js")
	.script("scripts/libs/backbone-min.js")
	.script("scripts/app.js")
	.script("scripts/model.js").wait()
	.script("scripts/view.js").wait()
	.script("scripts/app/hosts.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});

		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>
{/block}

{block name=banner}
	<h3>
		<i class="icon-th-list"></i> All Hosts
		<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
		<span class='input-append pull-right searchContainer'>
			<input id='filter' type="text" placeholder="Search..." />
			<button class='btn add-on'><i class="icon-search"></i></button>
		</span>
	</h3>
{/block}

{block name=navbar prepend}
	{assign var="nav" value="hosts"}
{/block}

{block name=content}

	<!-- underscore template for the collection -->
	<script type="text/template" id="hostCollectionTemplate">
		<div class="container-fluid">
		<table class="collection table table-bordered table-condensed">
		<thead>
			<tr>
				<th>Status<% if (page.orderBy == 'badge') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>			
				<th id="header_Id">Id<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Fqdn">Hostname<% if (page.orderBy == 'Fqdn') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_MysqlDbCluster">Mysql Cluster<% if (page.orderBy == 'MysqlDbCluster') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_MysqlDbClusterPart">Gizzard (partition)<% if (page.orderBy == 'MysqlDbClusterPart') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			 	<th id="header_NewRole">New Role<% if (page.orderBy == 'NewRole') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Type">Type<% if (page.orderBy == 'Type') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Platform">Platform<% if (page.orderBy == 'Platform') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_UnmonitoredUntil">Monitored status<% if (page.orderBy == 'UnmonitoredUntil') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Notes">Ticket\Note<% if (page.orderBy == 'n_notes') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
{* UNCOMMENT TO SHOW ADDITIONAL COLUMNS *}
{*
				<th id="header_Role">Role<% if (page.orderBy == 'Role') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_UpdatedAt">Updated At<% if (page.orderBy == 'UpdatedAt') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_PuppetBranch">Puppet Branch<% if (page.orderBy == 'PuppetBranch') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Ipaddr">Ipaddr<% if (page.orderBy == 'Ipaddr') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
*}
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%if (item.get('unmonitoredUntil') > 0) { %><i class="badge badge-successful"><% } else { %><i class="badge badge-important"><% } %></td>
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%= _.escape(item.get('fqdn') || '') %></td>
				<td><%= _.escape(item.get('mysqlDbCluster') || '') %></td>
				<td><%= _.escape(item.get('mysqlDbClusterPart') || '') %></td>
				<td><%= _.escape(item.get('newRole') || '') %></td>
				<td><%= _.escape(item.get('type') || '') %></td>
				<td><%= _.escape(item.get('platform') || '') %></td>
				<td><%= _.escape(item.get('unmonitoredUntil') || '') %></td>
				<td><%= _.escape(item.get('notes') || '') %></td>
{* uncomment to show additional colums *}
{*
				<td><%= _.escape(item.get('platform') || '') %></td>
				<td><%= _.escape(item.get('unmonitoredUntil') || '') %></td>
				<td><%= _.escape(item.get('role') || '') %></td>
				<td><%if (item.get('updatedAt')) { %><%= _date(app.parseDate(item.get('updatedAt'))).format('MMM D, YYYY h:mm A') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('puppetBranch') || '') %></td>
				<td><%= _.escape(item.get('ipaddr') || '') %></td>
*}
			</tr>
		<% }); %>
		</tbody>
		</table>
		<%=  view.getPaginationHtml(page) %>
	</script>
</div>
	<!-- underscore template for the model -->
	<script type="text/template" id="hostModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idInputContainer" class="control-group">
					<label class="control-label" for="id">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="id"><%= _.escape(item.get('id') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="fqdnInputContainer" class="control-group">
					<label class="control-label" for="fqdn">Fqdn</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge uneditable-input" id="fqdn" placeholder="Fqdn" value="<%= _.escape(item.get('fqdn') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="mysqlDbClusterInputContainer" class="control-group">
					<label class="control-label" for="mysqlDbCluster">Mysql Db Cluster</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge uneditable-input" id="mysqlDbCluster" placeholder="Mysql Db Cluster" value="<%= _.escape(item.get('mysqlDbCluster') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="mysqlDbClusterPartInputContainer" class="control-group">
					<label class="control-label" for="mysqlDbClusterPart">Mysql Db Cluster Part</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge uneditable-input" id="mysqlDbClusterPart" placeholder="Mysql Db Cluster Part" value="<%= _.escape(item.get('mysqlDbClusterPart') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="platformInputContainer" class="control-group">
					<label class="control-label" for="platform">Platform</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge uneditable-input" id="platform" placeholder="Platform" value="<%= _.escape(item.get('platform') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="unmonitoredUntilInputContainer" class="control-group">
					<label class="control-label" for="unmonitoredUntil">Unmonitored Until</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge uneditable-input" id="unmonitoredUntil" placeholder="Unmonitored Until" value="<%= _.escape(item.get('unmonitoredUntil') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="roleInputContainer" class="control-group">
					<label class="control-label" for="role">Role</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge uneditable-input" id="role" placeholder="Role" value="<%= _.escape(item.get('role') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="updatedAtInputContainer" class="control-group">
					<label class="control-label" for="updatedAt">Last Update</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="updatedAt" type="text" value="<%= _date(app.parseDate(item.get('updatedAt'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
							<input id="updatedAt-time" type="text" class="timepicker-default input-small uneditable-input" value="<%= _date(app.parseDate(item.get('updatedAt'))).format('h:mm A') %>" />
							<span><i class="icon-time"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="newRoleInputContainer" class="control-group">
					<label class="control-label" for="newRole">New Role</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge uneditable-input" id="newRole" placeholder="New Role" value="<%= _.escape(item.get('newRole') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="typeInputContainer" class="control-group">
					<label class="control-label" for="type">Type</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge uneditable-input" id="type" placeholder="Type" value="<%= _.escape(item.get('type') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>

				<div id="puppetBranchInputContainer" class="control-group">
					<label class="control-label" for="puppetBranch">Puppet Branch</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge uneditable-input" id="puppetBranch" placeholder="Puppet Branch" value="<%= _.escape(item.get('puppetBranch') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>
		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteHostButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteHostButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Host</button>
						<span id="confirmDeleteHostContainer" class="hide">
							<button id="cancelDeleteHostButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteHostButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="hostDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Host
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="hostModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveHostButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="hostCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newHostButton" class="btn btn-primary">Add Host</button>
	</p>

{/block}
