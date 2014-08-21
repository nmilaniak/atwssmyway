---
layout: default
title: Dosimeters
lead: Recorded dosimeter values of interventions in ATLAS
slug: dosimeters
dir: ..
---

	<?php readfile('https://atlas.web.cern.ch/Atlas/TCOORD/CavCom/plot.php'.
        (array_key_exists('InterventionID', $_GET) ? '?InterventionID='.$_GET['InterventionID'] : '')); 
        ?>
