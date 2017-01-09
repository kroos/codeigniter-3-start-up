<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Create the graph. These two calls are always required
$this->myjpgraph = new Graph(500,400); 
$this->myjpgraph->SetScale("textlin");

$this->myjpgraph->SetShadow();
$this->myjpgraph->img->SetMargin(40,30,20,40);

// Create the bar plots
$b1plot = new BarPlot($data1y);
$b1plot->SetFillColor("orange");
$b1plot->value->Show();
$b2plot = new BarPlot($data2y);
$b2plot->SetFillColor("blue");
$b2plot->value->Show();

// Create the grouped bar plot
$gbplot = new AccBarPlot(array($b1plot,$b2plot));

// ...and add it to the graPH
$this->myjpgraph->Add($gbplot);

$this->myjpgraph->title->Set("Accumulated bar plots");
$this->myjpgraph->xaxis->title->Set("X-title");
$this->myjpgraph->yaxis->title->Set("Y-title");

$this->myjpgraph->title->SetFont(FF_FONT1,FS_BOLD);
$this->myjpgraph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$this->myjpgraph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

// Display the graph
$this->myjpgraph->Stroke();
?>