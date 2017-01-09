<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_antispam-digits.php');
//require_once ('jpgraph/src/jpgraph_antispam.php');
require_once ('jpgraph/src/jpgraph_bar.php');
require_once ('jpgraph/src/jpgraph_canvas.php');
require_once ('jpgraph/src/jpgraph_canvtools.php');
require_once ('jpgraph/src/jpgraph_contour.php');
require_once ('jpgraph/src/jpgraph_date.php');
require_once ('jpgraph/src/jpgraph_errhandler.inc.php');
require_once ('jpgraph/src/jpgraph_error.php');
require_once ('jpgraph/src/jpgraph_flags.php');
//require_once ('jpgraph/src/jpgraph_gantt.php');
require_once ('jpgraph/src/jpgraph_gb2312.php');
require_once ('jpgraph/src/jpgraph_gradient.php');
require_once ('jpgraph/src/jpgraph_iconplot.php');
require_once ('jpgraph/src/jpgraph_imgtrans.php');
require_once ('jpgraph/src/jpgraph_led.php');
require_once ('jpgraph/src/jpgraph_legend.inc.php');
require_once ('jpgraph/src/jpgraph_line.php');
require_once ('jpgraph/src/jpgraph_log.php');
require_once ('jpgraph/src/jpgraph_meshinterpolate.inc.php');
require_once ('jpgraph/src/jpgraph_mgraph.php');
require_once ('jpgraph/src/jpgraph_pie.php');
require_once ('jpgraph/src/jpgraph_pie3d.php');
require_once ('jpgraph/src/jpgraph_plotband.php');
require_once ('jpgraph/src/jpgraph_plotline.php');
require_once ('jpgraph/src/jpgraph_plotmark.inc.php');
require_once ('jpgraph/src/jpgraph_polar.php');
require_once ('jpgraph/src/jpgraph_radar.php');
require_once ('jpgraph/src/jpgraph_regstat.php');
require_once ('jpgraph/src/jpgraph_rgb.inc.php');
require_once ('jpgraph/src/jpgraph_scatter.php');
require_once ('jpgraph/src/jpgraph_stock.php');
require_once ('jpgraph/src/jpgraph_table.php');
require_once ('jpgraph/src/jpgraph_text.inc.php');
require_once ('jpgraph/src/jpgraph_theme.inc.php');
require_once ('jpgraph/src/jpgraph_ttf.inc.php');
require_once ('jpgraph/src/jpgraph_utils.inc.php');
//require_once ('jpgraph/src/jpgraph_windrose.php');

class Myjpgraph extends Graph {
		function __construct() {
				// Call parent constructor
				parent::__construct();

				//callback config from Codeigniter
				$CI =& get_instance();
		}

	}
?>