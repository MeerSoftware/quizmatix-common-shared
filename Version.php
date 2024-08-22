<?php

// Copyright (C) 2023 meerSoftware Version.php by bariscodefx
// version info file

// Version name
$_VERSION = "v1.039";

// keep the real version data (for debug)
$_REAL_VERSION = $_VERSION;

// release type
$_RELEASE_TYPE = "release";

// if release type is debug set version to dynamic style for load everytime assets files
if($_RELEASE_TYPE === "debug") {
    $_VERSION = "dev-" . time();
} // made for realtime cookies
