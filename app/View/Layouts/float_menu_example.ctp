<style>
    .container {
  width: 1000px;
  position: relative;
}

.header {
  clear: both;
  margin-bottom: 10px;
  border: 1px solid #000000;
  height: 90px;
}

.sidebar {
  float: left;
  width: 350px;
  border: 1px solid #000000;
}

.content {
  float: right;
  width: 640px;
  border: 1px solid #000000;
  height: 800px;
}

.footer {
  clear: both;
  margin-top: 10px;
  border: 1px solid #000000;
  height: 820px;
}
</style>

<div class="container">
  <div class="header">
    This is header
  </div>
  <div class="sidebar sticky">
    This is side bar
  </div>
  <div class="content">
    This is main content
  </div>
  <div class="footer">
    <div class="sticky-stopper"></div>
    This is my footer
  </div>
</div>


