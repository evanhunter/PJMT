<html>

<!--***************************************************************************
*
* Filename:     Example.php
*
* Description:  An example of how the PHP JPEG Metadata Toolkit can be used to
*               display JPEG Metadata.
*
* Author:       Evan Hunter
*
* Date:         30/7/2004
*
* Project:      PHP JPEG Metadata Toolkit
*
* Revision:     1.00
*
* URL:          http://electronics.ozhiker.com
*
* Copyright:    Copyright Evan Hunter 2004
*
* License:      This file is part of the PHP JPEG Metadata Toolkit.
*
*               The PHP JPEG Metadata Toolkit is free software; you can
*               redistribute it and/or modify it under the terms of the
*               GNU General Public License as published by the Free Software
*               Foundation; either version 2 of the License, or (at your
*               option) any later version.
*
*               The PHP JPEG Metadata Toolkit is distributed in the hope
*               that it will be useful, but WITHOUT ANY WARRANTY; without
*               even the implied warranty of MERCHANTABILITY or FITNESS
*               FOR A PARTICULAR PURPOSE.  See the GNU General Public License
*               for more details.
*
*               You should have received a copy of the GNU General Public
*               License along with the PHP JPEG Metadata Toolkit; if not,
*               write to the Free Software Foundation, Inc., 59 Temple
*               Place, Suite 330, Boston, MA  02111-1307  USA
*
*               If you require a different license for commercial or other
*               purposes, please contact the author: evan@ozhiker.com
*
***************************************************************************-->

        <head>
        
                <META HTTP-EQUIV="Content-Style-Type" CONTENT="text/css">
                <STYLE TYPE="text/css" MEDIA="screen, print, projection">
                <!--

                        BODY { background-color:#505050; color:#F0F0F0 }
                        a  { color:orange  }
                        .EXIF_Main_Heading { color:red }
                        .EXIF_Secondary_Heading{ color: orange}
                        .EXIF_Table {  border-collapse: collapse ; border: 1px solid #909000}
                        .EXIF_Table tbody td{border-width: 1px; border-style:solid; border-color: #909000;}

                -->
                </STYLE>


                <?php
                        // Turn off Error Reporting
                        error_reporting ( 0 );

                        // Hide any unknown EXIF tags
                        $GLOBALS['HIDE_UNKNOWN_TAGS'] = TRUE;
                        
                        
                        include 'JPEG.php';
                        include 'JFIF.php';
                        include 'PictureInfo.php';
                        include 'XMP.php';
                        include 'Photoshop_IRB.php';
                        include 'EXIF.php';

                        // Retrieve the JPEG image filename from the http url request
                        if ($GLOBALS['HTTP_GET_VARS']['filename']=="")
                        {
                                echo "<p>No filename defined</p>\n";
                        }
                        else
                        {
                                $filename = $GLOBALS['HTTP_GET_VARS']['filename'];
                        }


                        // Output the title
                        echo "<title>Metadata details for $filename</title>";
                        
                        // Retrieve the header information
                        $jpeg_header_data = get_jpeg_header_data( $filename );

                 ?>

        </head>
        
        <body>

                <a href="/electronics/pjmt/">PHP JPEG Metadata Toolkit</a>

                <h2><B><U>Metadata for &quot;<?php echo $filename; ?>&quot;</U></B></h2>

                <!-- Output the information about the APP segments -->
                <?php   echo Generate_JPEG_APP_Segment_HTML( $jpeg_header_data ); ?>

                <BR>
                <HR>
                <BR>

                <!-- Output the Intrinsic JPEG Information -->
                <?php   echo Interpret_intrinsic_values_to_HTML( get_jpeg_intrinsic_values( $jpeg_header_data ) );  ?>

                <BR>
                <HR>
                <BR>

                <!-- Output the JPEG Comment -->
                <?php   echo Interpret_Comment_to_HTML( $jpeg_header_data ); ?>

                <BR>
                <HR>
                <BR>

                <!-- Output the JPEG File Interchange Format Information -->
                <?php   echo Interpret_JFIF_to_HTML( get_JFIF( $jpeg_header_data ), $filename ); ?>

                <BR>
                <HR>
                <BR>
                
                <!-- Output the JFIF Extension Information -->
                <?php   echo Interpret_JFXX_to_HTML( get_JFXX( $jpeg_header_data ), $filename ); ?>
                
                <BR>
                <HR>
                <BR>

                <!-- Output the Picture Info Text -->
                <?php   echo Interpret_App12_Pic_Info_to_HTML( $jpeg_header_data ); ?>

                <BR>
                <HR>
                <BR>

                <!-- Output the EXIF Information -->
                <?php   echo Interpret_EXIF_to_HTML( get_EXIF_JPEG( $filename ), $filename );  ?>

                <BR>
                <HR>
                <BR>

                <!-- Output the XMP Information -->
                <?php   echo Interpret_XMP_to_HTML( read_XMP_array_from_text( get_XMP_text( $jpeg_header_data ) ) ); ?>

                <BR>
                <HR>
                <BR>
                
                <!-- Output the Photoshop IRB (including the IPTC-NAA info -->
                <?php   echo Interpret_IRB_to_HTML( get_Photoshop_IRB( $jpeg_header_data ), $filename ); ?>

                <BR>
                <HR>
                <BR>
                
                <!-- Output the Meta Information -->
                <?php   echo Interpret_EXIF_to_HTML( get_Meta_JPEG( $filename ), $filename );  ?>

                <BR>
                <HR>
                <BR>
                
                <!-- Display the original image -->
                
                <h2>Original Image</h2>
                <?php   echo "<img src=\"$filename\">";  ?>


                <BR>
                <BR>
                <BR>
                <p>Interpreted using:</p>
                <p>PHP JPEG Metadata Toolkit version 1.0, Copyright (C) 2004 Evan Hunter</p>

        </body>

</html>




