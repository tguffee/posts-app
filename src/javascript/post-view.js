
var RefreshButton = React.createClass({
	handleClick:  function() {
		    $.ajax({
		      url: 'http://localhost/posts-app/index.php/post_controller/refreshPosts',
		      success: function() {
		    	  this.props.onDataChange();
		      }.bind(this)
		    });
		  },
		  
	  render: function() {
	    return (
		  <button onClick={this.handleClick} name="refreshButton" id="refreshButton">Refresh Posts</button>
	    );
	  }
});

var DeleteButton = React.createClass({
	handleClick:  function() {
		$.ajax({
	    	type:'post',
	    	url: 'http://localhost/posts-app/index.php/post_controller/deletePost',
	    	data: 'id=' + this.props.value,
	    	success: function() {
	    		this.props.onRowDelete();
	      }.bind(this)
	    });
	  },

	  render: function() {
		return (
			<button onClick={this.handleClick} name="deleteButton" id="deleteButton" >Delete</button>
				);
	}
});


var PostView = React.createClass({

	  loadPosts: function() {
	    $.ajax({
	      url: 'http://localhost/posts-app/index.php/post_controller/loadPosts',
	      dataType: 'json',
	      success: function(data) {
	        this.setState({data: data});
	      }.bind(this),
	      error: function(xhr, status, err) {
	        console.error('#GET Error', status, err.toString());
	      }.bind(this)
	    });
	  },

	  getInitialState: function(){
		    return {
		    	data: {
		          posts: [] 
		       }
		    };
		},

	  componentDidMount: function() {
	    this.loadPosts();
	  },
	  
	  handleDataChange: function() {
		  this.loadPosts();
	  },

	  render: function() {
	    return (
    		<div>
	    		<h1>Posts</h1>
	
	    		<div id="refresh">
	    			<RefreshButton onDataChange={this.handleDataChange}/>
	    		</div>
    			<div id="container">
    			 	<div><PostTable data={this.state.data} onRowDelete={this.handleDataChange}/></div>
    			 </div>
	        </div>
	    );
	  }
	});

	var PostTableHeader = React.createClass({
		render: function() {
			return (
		    		<thead>
		    		<tr>
		    		<th>ID</th>
		    		<th>Platform</th>
		    		<th>Date</th>
		    		<th>Title</th>
		    		<th>Description</th>
		    		<th></th>
		    		</tr>
		    		</thead>
		    )	
		}
	});

	var PostTable = React.createClass({
		
	  render: function() {
		  
		  if (!this.props.data.posts) {
	            return (
	    	    		<table width="100%" cellPadding="4" cellSpacing="4">
	    	    		<PostTableHeader />
	    	    		<tbody>
	    	    		<tr></tr>
	    	    		</tbody></table>
	            );
	        }

		    return (
		    		<table width="100%" cellPadding="4" cellSpacing="4">
		    		<PostTableHeader />
		    		<tbody>

		        {
		        	this.props.data.posts.map(function(post) {
		        		
		        		return <tr>
		        		   <td>{post.id}</td>
		        		   <td>{post.platform}</td>
		        		   <td>{post.date}</td>
		        		   <td>{post.title}</td>
		        		   <td>{post.description}</td>
		        		   <td><DeleteButton onRowDelete={this.props.onRowDelete} value={post.id} /></td>
		        		   </tr>
		        		   
		        		}, this)
		        }
		        	</tbody>
		        	</table>
		    )
		  }
		});
	
	ReactDOM.render(
	  <PostView />,
	  document.getElementById('body')
	);