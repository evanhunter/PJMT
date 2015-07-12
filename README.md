# The PHP JPEG Metadata Toolkit - Documentation

## Introduction

The PHP JPEG Metadata Toolkit is a library of functions which allows manipulation of many types of metadata that reside in a JPEG image file.

The metadata that can be accessed by this library include:

| Metadata Type Name                                           | Contents
| ------------------------------------------------------------ | ----------------------------------------------------------------------------------------------
| EXIF, DCF & TIFF/EP - including makernotes                   | Contains Digital Camera Settings. Can contain a thumbnail.
| XMP, RDF & Dublin Core, including multiple language support  | Can contain Digital camera settings and text headings/captions.
| Photoshop IRB & IPTC-NAA IIM                                 | Contains Photoshop settings and can contain text headings/captions. Can contain a thumbnail.
| Picture Info                                                 | Contains Digital Camera Settings for older cameras
| JFIF & JFIF Extension                                        | Contains limited info about the image and can contain a thumbnail
| Intrinsic JPEG Values                                        | Contains limited info configuration of the image


## Other features

Has been tested with over 450 popular digital cameras
Provides access to lots of metadata for which php has no built in support
Works with many files that have corrupted metadata.
Customisable look of the HTML output via style sheets

# Requirements

The toolkit requires PHP 4 or higher - Has been tested with PHP 4.3.7 and 4.3.8


# Example Scripts

Included with the PHP JPEG Metadata Toolkit are several example scripts, which show how the library can be used to retrieve and store the metadata in a JPEG image file. Below are explanations of some of the commands used in the scripts.

| File                                                                                                 | Demo Description
| ---------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------
| [Example.php](Example.php)                                                                           | Displays detailed information about the metadata in a JPEG file.
| [TIFFExample.php](TIFFExample.php)                                                                   | Displays detailed information about the metadata in a JPEG file.
| [Edit_File_Info_Example.php](Edit_File_Info_Example.php), [Write_File_Info.php](Write_File_Info.php) | Allows editing of metadata over the internet in exactly the same format as Photoshop"s "File Info" dialog box.



[Go here for Function reference, live demo, and further information](http://www.ozhiker.com/electronics/pjmt/)
