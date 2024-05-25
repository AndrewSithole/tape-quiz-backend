<?php
namespace Database\Seeders;

use App\Models\Message;
use DateTime;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = <<<LIST
65-1212, Communion, Tucson Tabernacle, Tucson, AZ, 32 min
65-1207, Leadership, Covina Bowl, Covina, CA, 120 min
65-1206, Modern Events Are Made Clear By Prophecy, Orange Bowl, San Bernardino, CA, 113 min
65-1205, Things That Are To Be, First Assembly Of God, Rialto, CA, 125 min
65-1204, The Rapture, Ramada Inn, Yuma, AZ, 101 min
65-1128M, God's Only Provided Place Of Worship, Life Tabernacle, Shreveport, LA, 124 min
65-1128E, On The Wings Of A Snow-White Dove, Life Tabernacle, Shreveport, LA, 127 min
65-1127E, I Have Heard But Now I See, Life Tabernacle, Shreveport, LA, 116 min
65-1127B, Trying To Do God A Service Without It Being God's Will, Washington Youree Hotel, Shreveport, LA, 150 min
65-1126, Works Is Faith Expressed, Life Tabernacle, Shreveport, LA, 125 min
65-1125, The Invisible Union Of The Bride Of Christ, Life Tabernacle, Shreveport, LA, 146 min
65-1121, What House Will You Build Me?, Tucson Tabernacle, Tucson, AZ, 27 min
65-1031M, Power Of Transformation, Pine Lawn Trailer Park, Prescott, AZ, 122 min
65-1031A, Leadership, Pine Lawn Trailer Park, Prescott, AZ, 56 min
65-0919, Thirst, Grant Way Assembly Of God, Tucson, AZ, 112 min
65-0911, God's Power To Transform, Ramada Inn, Phoenix, AZ, 146 min
65-0829, Satan's Eden, Branham Tabernacle, Jeffersonville, IN, 85 min
65-0822M, Christ Is Revealed In His Own Word, Branham Tabernacle, Jeffersonville, IN, 127 min
65-0822E, A Thinking Man's Filter, Branham Tabernacle, Jeffersonville, IN, 114 min
65-0815, And Knoweth It Not, Branham Tabernacle, Jeffersonville, IN, 107 min
65-0801M, The God Of This Evil Age, Branham Tabernacle, Jeffersonville, IN, 157 min
65-0801E, Events Made Clear By Prophecy, Branham Tabernacle, Jeffersonville, IN, 112 min
65-0725M, The Anointed Ones At The End Time, Branham Tabernacle, Jeffersonville, IN, 193 min
65-0725E, What Is The Attraction On The Mountain?, Branham Tabernacle, Jeffersonville, IN, 107 min
65-0718M, Trying To Do God A Service Without Being The Will Of God, Branham Tabernacle, Jeffersonville, IN, 127 min
65-0718E, Spiritual Food In Due Season, Branham Tabernacle, Jeffersonville, IN, 89 min
65-0711, Ashamed, Branham Tabernacle, Jeffersonville, IN, 99 min
65-0429E, The Choosing Of A Bride, Biltmore Hotel, Los Angeles, CA, 101 min
65-0429B, The Seed Shall Not Be Heir With The Shuck, Biltmore Hotel, Los Angeles, CA, 62 min
65-0427, Does God Change His Mind?, Embassy Hotel, Los Angeles, CA, 88 min
65-0426, Proving His Word, Embassy Hotel, Los Angeles, CA, 123 min
65-0425, God's Provided Place Of Worship, Embassy Hotel, Los Angeles, CA, 99 min
65-0424, One In A Million, Clifton's Cafeteria, Los Angeles, CA, 49 min
65-0418M, It Is The Rising Of The Sun, Branham Tabernacle, Jeffersonville, IN, 150 min
65-0418E, Does God Ever Change His Mind About His Word?, Branham Tabernacle, Jeffersonville, IN, 132 min
65-0410, The Easter Seal, Ramada Inn, Phoenix, AZ, 137 min
65-0221M, Marriage And Divorce, Park View Junior High School, Jeffersonville, IN, 147 min
65-0221E, Who Is This Melchisedec?, Park View Junior High School, Jeffersonville, IN, 109 min
65-0220x, Wedding Ceremony, Branham Tabernacle, Jeffersonville, IN, 22 mins
65-0220w, Wedding Ceremony, Branham Tabernacle, Jeffersonville, IN, 22 mins
65-0220, God's Chosen Place Of Worship, Park View Junior High School, Jeffersonville, IN, 85 min
65-0219, This Day This Scripture Is Fulfilled, Park View Junior High School, Jeffersonville, IN, 82 min
65-0218, The Seed Is Not Heir With The Shuck, Park View Junior High School, Jeffersonville, IN, 91 min
65-0217, A Man Running From The Presence Of The Lord, Branham Tabernacle, Jeffersonville, IN, 93 min
65-0206, Doors In Door, Americana Hotel, Flagstaff, AZ, 108 min
65-0125, This Day This Scripture Is Fulfilled, Ramada Inn, Phoenix, AZ, 36 min
65-0124, Birth Pains, Ramada Inn, Phoenix, AZ, 101 min
65-0123, Broken Cisterns, Ramada Inn, Phoenix, AZ, 84 min
65-0120, Lean Not Unto Thy Own Understanding, Ramada Inn, Phoenix, AZ, 112 min
65-0119, The God Who Is Rich In Mercy, Westward Ho Hotel, Phoenix, AZ, 89 min
65-0118, The Seed Of Discrepancy, Westward Ho Hotel, Phoenix, AZ, 77 min
65-0117, A Paradox, Westward Ho Hotel, Phoenix, AZ, 95 min
65-0116w, Wedding Ceremony, Private Home, Tucson, AZ, 8 mins
64-1227, Who Do You Say This Is?, Jesus Name Church, Phoenix, AZ, 114 min
64-1221, Why It Had To Be Shepherds, Ramada Inn, Tucson, AZ, 157 min
64-1212, The Harvest Time, Ramada Inn, Phoenix, AZ, 150 min
64-1205, The Identified Masterpiece Of God, Stardust Motel, Yuma, AZ, 93 min
64-0830M, Questions And Answers #3, Branham Tabernacle, Jeffersonville, IN, 189 min
64-0830E, Questions And Answers #4, Branham Tabernacle, Jeffersonville, IN, 113 min
64-0823M, Questions And Answers #1, Branham Tabernacle, Jeffersonville, IN, 173 min
64-0823E, Questions And Answers #2, Branham Tabernacle, Jeffersonville, IN, 164 min
64-0816, Proving His Word, Branham Tabernacle, Jeffersonville, IN, 170 min
64-0802, The Future Home Of The Heavenly Bridegroom And The Earthly Bride, Branham Tabernacle, Jeffersonville, IN, 210 min
64-0726M, Recognizing Your Day And Its Message, Branham Tabernacle, Jeffersonville, IN, 131 min
64-0726E, Broken Cisterns, Branham Tabernacle, Jeffersonville, IN, 88 min
64-0719M, The Feast Of The Trumpets, Branham Tabernacle, Jeffersonville, IN, 122 min
64-0719E, Going Beyond The Camp, Branham Tabernacle, Jeffersonville, IN, 86 min
64-0705X, Private Interview, Branham Tabernacle, Jeffersonville, IN, 7 mins
64-0705, The Masterpiece, Branham Tabernacle, Jeffersonville, IN, 135 min
64-0629, The Mighty God Unveiled Before Us, Bellevue-Stratford Hotel, Philadelphia, PA, 87 min
64-0621, The Trial, Municipal Auditorium, Topeka, KS, 88 min
64-0620E, God Has A Provided Lamb, Municipal Auditorium, Topeka, KS, 75 min
64-0620B, Who Is Jesus?, Holiday Inn, Topeka, KS, 66 min
64-0619, Perseverant, Municipal Auditorium, Topeka, KS, 92 min
64-0618, The Presence Of God Unrecognized, Municipal Auditorium, Topeka, KS, 84 min
64-0617, The Identified Christ Of All Ages, Municipal Auditorium, Topeka, KS, 72 min
64-0614M, The Unveiling Of God, Branham Tabernacle, Jeffersonville, IN, 172 min
64-0614E, The Oddball, Branham Tabernacle, Jeffersonville, IN, 91 min
64-0531, The Oddball, Pine Lawn Trailer Park, Prescott, AZ, 43 min
64-0427, A Trial, Ramada Inn, Tucson, AZ, 105 min
64-0419, The Trial, Mckay Auditorium, Tampa, FL, 73 min
64-0418E, Jesus Keeps All His Appointments, Mckay Auditorium, Tampa, FL, 107 min
64-0418B, A Paradox, Morrison's Cafeteria, Tampa, FL, 104 min
64-0417, Then Jesus Came And Called, Mckay Auditorium, Tampa ,FL, 86 min
64-0416, And When Their Eyes Were Opened, They Knew Him, Mckay Auditorium, Tampa, FL, 86 min
64-0415, Christ Is Identified The Same In All Generations, Mckay Auditorium, Tampa, Fl, 91 min
64-0412, A Court Trial, National Guard Armory, Birmingham, AL, 88 min
64-0411, Spiritual Amnesia, National Guard Armory, Birmingham, AL, 79 min
64-0410, Scriptural Signs Of The Time, National Guard Armory, Birmingham, AL, 78 min
64-0409, The Identification Of Christ In All Ages, National Guard Armory, Birmingham, AL, 87 min
64-0405, A Trial, 4-H Club Barn, Louisville, MS, 62 min
64-0404, Jehovah-Jireh #3, 4-H Club Barn, Louisville, MS, 85 min
64-0403, Jehovah-Jireh #2, 4-H Club Barn, Louisville, MS, 85 min
64-0402, Jehovah-Jireh #1, 4-H Club Barn, Louisville, MS, 76 min
64-0401, The Identified Christ Of All Ages, 4-H Club Barn, Louisville, MS, 74 min
64-0322, Possessing The Gate Of The Enemy After Trial, Denham Springs High School, Denham Springs, LA, 69 min
64-0321E, The Voice Of The Sign, Denham Springs High School, Denham Springs, LA, 116 min
64-0321B, He Was To Pass This Way, The Supper Club, Baton Rouge, LA, 51 min
64-0320, God Identifying Himself By His Characteristics, Denham Springs High School, Denham Springs, LA, 84 min
64-0319, Calling Jesus On The Scene, Denham Springs High School, Denham Springs, LA, 74 min
64-0318, Sir, We Would See Jesus, Denham Springs High School, Denham Springs, LA, 76 min
64-0315, Influence, Municipal Auditorium, Beaumont, TX, 103 min
64-0314, The Investments, Beaumont Hotel, Beaumont,TX, 75 min
64-0313, The Voice Of The Sign, Municipal Auditorium, Beaumont, TX, 82 min
64-0312, When Their Eyes Were Opened, They Knew Him, Municipal Auditorium, Beaumont, TX, 84 min
64-0311, God Is Identified By His Characteristics, Municipal Auditorium, Beaumont, TX, 77 min
64-0308, The Token, Soul's Harbor Temple, Dallas, TX, 87 min
64-0307, A Testimony On The Sea, Soul's Harbor Temple, Dallas, TX, 81 min
64-0306, A Greater Than Solomon Is Here Now, Soul's Harbor Temple, Dallas, TX, 89 min
64-0305, Perseverant, Soul's Harbor Temple, Dallas, TX, 88 min
64-0304, Sirs, We Would See Jesus, Soul's Harbor Temple, Dallas, TX, 69 min
64-0216, Identification, Elliott Auditorium, Tulare, CA, 103 min
64-0215, Influences, Elliott Auditorium, Tulare, CA, 75 min
64-0214, The Voice Of The Sign, Elliott Auditorium, Tulare, CA, 84 min
64-0213, Then Jesus Came And Called, Elliott Auditorium, Tulare, CA, 67 min
64-0212, When Their Eyes Were Opened, They Knew Him, Elliott Auditorium, Tulare, CA, 78 min
64-0209, Countdown, Kern County Fairgrounds, Bakersfield, CA, 71 min
64-0208, The Token, Kern County Fairgrounds, Bakersfield, CA, 80 min
64-0207, The Patriarch Abraham, Kern County Fairgrounds, Bakersfield, CA, 65 min
64-0206E, God's Provided Way For This Day, Kern County Fairgrounds, Bakersfield, CA, 54 min
64-0206B, Paradox, Salad Bowl Restaurant, Bakersfield, CA, 99 min
64-0205, God Is His Own Interpreter, Kern County Fairgrounds, Bakersfield, CA, 56 min
64-0126, What Shall We Do With This Jesus Called Christ?, Ramada Inn, Phoenix, AZ, 59 min
64-0125, Turn On The Light, Ramada Inn, Phoenix, AZ, 59 min
64-0122, Looking Unto Jesus, Ramada Inn, Phoenix, AZ, 77 min
64-0121, God's Word Calls For A Total Separation From Unbelief, Ramada Inn, Phoenix, AZ, 88 min
64-0120, His Unfailing Words Of Promise, Ramada Inn, Phoenix, AZ, 73 min
64-0119, Shalom, Ramada Inn, Phoenix, AZ, 95 min
64-0112, Shalom, House Meeting, Sierra Vista, AZ, 137 min
63-1229M, There Is A Man Here That Can Turn On The Light, Branham Tabernacle, Jeffersonville, IN, 144 min
63-1229E, Look Away To Jesus, Branham Tabernacle, Jeffersonville, IN, 129 min
63-1226, Church Order, Branham Tabernacle, Jeffersonville, IN, 108 min
63-1222, God's Gifts Always Find Their Places, Branham Tabernacle, Jeffersonville, IN, 86 min
63-1216, We Have Seen His Star And Have Come To Worship Him, Ramada Inn, Tucson, AZ, 99 min
63-1214, Why Little Bethlehem, Ramada Inn, Phoenix, AZ, 104 min
63-1201w, Wedding Ceremony, Life Tabernacle, Shreveport, LA, 12 min
63-1201M, An Absolute, Life Tabernacle, Shreveport, LA, 77 min
63-1201E, Just Once More, Lord, Life Tabernacle, Shreveport, LA, 79 min
63-1130E, Go, Awake Jesus, Life Tabernacle, Shreveport, LA, 108 min
63-1130B, Influence, Captain Shreve Hotel, Shreveport, LA, 88 min
63-1129, The Super Sign, Life Tabernacle, Shreveport, LA, 86 min
63-1128M, Testimony, Life Tabernacle, Shreveport, LA, 66 min
63-1128E, The Token, Life Tabernacle, Shreveport, LA, 104 min
63-1127, The World Is Again Falling Apart, Life Tabernacle, Shreveport, LA, 93 min
63-1124M, What Shall I Do With Jesus Called Christ?, Branham Tabernacle, Jeffersonville, IN, 137 min
63-1124E, Three Kinds Of Believers, Branham Tabernacle, Jeffersonville, IN, 111 min
63-1118, I Am The Resurrection And Life, Lyon's Funeral Home, Campbellsville, KY, 49 min
63-1117, Once More, The Rock Church, New York, NY, 112 min
63-1116E, Perseverance, Marc Ballroom, New York, NY, 116 min
63-1116B, Investments, Statler Hotel, New York, NY, 96 min
63-1115, The World Is Falling Apart, Marc Ballroom, New York, NY, 96 min
63-1114, Influence, Marc Ballroom, New York, NY, 96 min
63-1113, The Sign Of This Time, Marc Ballroom, New York, NY, 108 min
63-1112, Sir, We Would See Jesus, Marc Ballroom, New York, NY, 103 min
63-1110M, Souls That Are In Prison Now, Branham Tabernacle, Jeffersonville, IN, 167 min
63-1110E, He That Is In You, Branham Tabernacle, Jeffersonville, IN, 124 min
63-1103, Go, Wake Jesus, Grant Way Assembly Of God, Tucson, AZ, 123 min
63-1028, Pardon, Ramada Inn, Tucson, AZ, 88 min
63-0901M, Token, Branham Tabernacle, Jeffersonville, IN, 164 min
63-0901E, Desperations, Branham Tabernacle, Jeffersonville, IN, 136 min
63-0825M, How Can I Overcome?, Branham Tabernacle, Jeffersonville, IN, 113 min
63-0825E, Perfect Faith, Branham Tabernacle Jeffersonville, IN, 106 min
63-0818, The Uniting Time And Sign, Branham Tabernacle Jeffersonville, IN, 84 min
63-0804E, Calling Jesus On The Scene, Marigold Center, Chicago, IL, 80 min
63-0804A, Once More, Marigold Center, Chicago, IL, 63 min
63-0803E, Influence, Lane Tech High School, Chicago, IL, 94 min
63-0803B, Investments, Edgewater Beach Hotel, Chicago, IL, 108 min
63-0802, Perseverant, Marigold Center, Chicago, IL, 103 min
63-0801, A Paradox, Marigold Center, Chicago, IL, 80 min
63-0731, There Is Only One Way Provided By God For Anything, Marigold Center, Chicago, IL, 101 min
63-0728, Christ Is The Mystery Of God Revealed, Branham Tabernacle, Jeffersonville, IN, 225 min
63-0724, God Doesn't Call Man To Judgment Without First Warning Him, Branham Tabernacle, Jeffersonville, IN, 103 min
63-0721, He Cares. Do You Care?, Branham Tabernacle, Jeffersonville, IN, 148 min
63-0717, A Prisoner, Branham Tabernacle, Jeffersonville, IN, 85 min
63-0714M, Why Cry? Speak!, Branham Tabernacle, Jeffersonville, IN, 130 min
63-0714E, Humble Thyself, Branham Tabernacle, Jeffersonville, IN, 39 min
63-0707M, The Indictment, Branham Tabernacle, Jeffersonville, IN, 161 min
63-0707E, Communion, Branham Tabernacle, Jeffersonville, IN, 76 min
63-0630M, The Third Exodus, Branham Tabernacle, Jeffersonville, IN, 136 min
63-0630E, Is Your Life Worthy Of The Gospel?, Branham Tabernacle, Jeffersonville, IN, 153 min
63-0628M, O Lord, Just Once More, Associated Brotherhood Of Christians Campground, Hot Springs, AR, 88 min
63-0628E, A Greater Than Solomon Is Here, Associated Brotherhood Of Christians Campground, Hot Springs, AR, 133 min
63-0627, Jesus Christ The Same Yesterday, Today, And Forever, Associated Brotherhood Of Christians Campground, Hot Springs, AR, 130 min
63-0626, Why?, Associated Brotherhood Of Christians Campground, Hot Springs, AR, 84 min
63-0623M, Standing In The Gap, Branham Tabernacle, Jeffersonville, IN, 114 min
63-0623E, The Flashing Red Light Of The Sign Of His Coming, Branham Tabernacle, Jeffersonville, IN, 140 min
63-0608, Conferences, Ramada Inn, Tucson, AZ, 109 min
63-0607, Be Not Afraid, Ramada Inn, Tucson, AZ, 127 min
63-0606, Show Us The Father, Ramada Inn, Tucson, AZ, 96 min
63-0605, Greater Than Solomon Is Here, Ramada Inn, Tucson, AZ, 128 min
63-0604, Jesus Christ The Same Yesterday, Today, And Forever, Ramada Inn, Tucson, AZ, 101 min
63-0601, Come, Follow Me, House Meeting, Tucson, AZ, 43 min
63-0428, Look, Jesus Name Church, Phoenix, AZ, 107 min
63-0421, Victory Day, House Meeting, Sierra Vista, AZ, 112 min
63-0412M, The World Is Falling Apart, Western Skies Motel, Albuquerque, NM, 100 min
63-0412E, God Hiding Himself In Simplicity, Western Skies Motel, Albuquerque, NM, 130 min
63-0324M, Questions And Answers On The Seals, Branham Tabernacle, Jeffersonville, IN, 171 min
63-0324E, The Seventh Seal, Branham Tabernacle, Jeffersonville, IN, 159 min
63-0323, The Sixth Seal, Branham Tabernacle, Jeffersonville, IN, 157 min
63-0322, The Fifth Seal, Branham Tabernacle, Jeffersonville, IN, 159 min
63-0321, The Fourth Seal, Branham Tabernacle, Jeffersonville, IN, 136 min
63-0320, The Third Seal, Branham Tabernacle, Jeffersonville, IN, 125 min
63-0319, The Second Seal, Branham Tabernacle, Jeffersonville, IN, 135 min
63-0318, The First Seal, Branham Tabernacle, Jeffersonville, IN, 161 min
63-0317M, God Hiding Himself In Simplicity, Then Revealing Himself In The Same, Branham Tabernacle, Jeffersonville, IN, 177 min
63-0317E, The Breach Between The Seven Church Ages And The Seven Seals, Branham Tabernacle, Jeffersonville, IN, 157 min
63-0304, A Absolute, City Auditorium, Houston, TX, 50 min
63-0223, A Door In A Door, Ramada Inn, Tucson, AZ, 101 min
63-0127, An Absolute, Ramada Inn, Phoenix, AZ, 112 min
63-0126, Investments, Ramada Inn, Phoenix, AZ, 114 min
63-0123, Identification, First Assembly Of God, Phoenix, AZ, 131 min
63-0122, Remembering The Lord, Southside Assembly Of God, Phoenix, AZ, 98 min
63-0121, Zacchaeus, The Businessman, Ramada Inn, Tucson, AZ, 81 min
63-0120M, The Voice Of God In This Last Days, Apostolic Church, Phoenix, AZ, 80 min
63-0120E, Just One More Time, Lord, Jesus Name Church, Phoenix, AZ, 107 min
63-0119, The Way Of A True Prophet, Faith Temple, Phoenix, AZ, 119 min
63-0118, Spirit Of Truth, Church Of All Nations, Phoenix AZ, 108 min
63-0117, Awakening Jesus, Full Gospel Church, Tempe AZ, 111 min
63-0116, The Evening Messenger, Pentecostal Church Of God, Mesa, AZ, 134 min
63-0115, Accepting God's Provided Way At The End Time, Church Of All Nations, Phoenix, AZ, 114 min
63-0114, A Trumpet Gives An Uncertain Sound, Christian Assembly, Phoenix, AZ, 103 min
63-0113M, Letting Off Pressure, Church Of God, Phoenix, AZ, 80 min
63-0113E, Perseverance, Foursquare Church, Phoenix, AZ, 100 min
63-0112, Influence, Ramada Inn, Phoenix, AZ, 117 min
62-1231, The Contest, Branham Tabernacle, Jeffersonville, IN, 64 min
62-1230M, Absolute, Branham Tabernacle, Jeffersonville, IN, 139 min
62-1230E, Is This The Sign Of The End, Sir?, Branham Tabernacle, Jeffersonville, IN, 187 min
62-1223, The Reproach For The Cause Of The Word, Branham Tabernacle, Jeffersonville, IN, 110 min
62-1216, The Falling Apart Of The World, Branham Tabernacle, Jeffersonville, IN, 151 min
62-1209, Remembering The Lord, Branham Tabernacle, Jeffersonville, IN, 81 min
62-1125M, Convinced And Then Concerned, Life Tabernacle, Shreveport, LA, 102 min
62-1125E, The Countdown, Life Tabernacle, Shreveport, LA, 84 min
62-1124E, All Things, Life Tabernacle, Shreveport, LA, 92 min
62-1124B, Investments, Washington Youree Hotel, Shreveport, LA, 96 min
62-1123, The Way Back, Life Tabernacle, Shreveport, LA, 141 min
62-1122, Return And Jubilee, Life Tabernacle, Shreveport, LA, 103 min
62-1111M, Dedication, Full Gospel Apostolic Church, Elizabethtown, KY, 65 min
62-1111E, Why I'm Against Organized Religion, Branham Tabernacle, Jeffersonville, IN, 173 min
62-1104M, Blasphemous Names, Branham Tabernacle, Jeffersonville, IN, 117 min
62-1104E, Ordination, Branham Tabernacle, Jeffersonville, IN, 46 min
62-1014M, The Stature Of A Perfect Man, Branham Tabernacle, Jeffersonville, IN, 178 min
62-1014E, A Guide, Branham Tabernacle, Jeffersonville, IN, 101 min
62-1013, The Influence Of Another, Branham Tabernacle, Jeffersonville, IN, 111 min
62-1007, The Key To The Door, Branham Tabernacle, Jeffersonville, IN, 92 min
62-0909M, Countdown, Branham Tabernacle, Jeffersonville, IN, 87 min
62-0909E, In His Presence, Branham Tabernacle, Jeffersonville, IN, 85 min
62-0908, Present Stage Of My Ministry, Branham Tabernacle, Jeffersonville, IN, 95 min
62-0729, Perseverant, Curling Arena, Victoria, BC, 94 min
62-0728, God Has A Provided Way, Curling Arena, Victoria, BC, 113 min
62-0727, We Would See Jesus, Curling Arena, Victoria, BC, 98 min
62-0726, It Is I Be Not Afraid, Legion Auditorium, Port Alberni, BC, 108 min
62-0725, A Greater Than Solomon Is Here, Legion Auditorium, Port Alberni, BC, 105 min
62-0724, Sir, We Would See Jesus, Legion Auditorium, Port Alberni, BC, 111 min
62-0722, Show Us The Father And It Will Suffice Us, National Guard Armory, Salem, OR, 92 min
62-0721, Behold, A Greater Than Solomon Is Here, National Guard Armory, Salem, OR, 95 min
62-0720, A Testimony On The Sea, National Guard Armory, Salem, OR, 108 min
62-0719E, Perseverant, National Guard Armory, Salem, OR, 113 min
62-0719B, Life, Marion Hotel, Salem, OR, 55 min
62-0718, Jesus Christ The Same Yesterday, Today, And Forever, National Guard Armory, Salem, OR, 112 min
62-0715, Behold, A Greater Than All Of Them Is Here, Open Bible Standard Church, Spokane, WA, 125 min
62-0714, The Uncertain Sound, Open Bible Standard Church, Spokane, WA, 122 min
62-0713, From That Time, Open Bible Standard Church, Spokane, WA, 112 min
62-0712, We Would See Jesus, Open Bible Standard Church, Spokane, WA, 110 min
62-0711, Hear Ye Him, Open Bible Standard Church, Spokane, WA, 96 min
62-0708, A Super Sign, Municipal Auditorium, Grass Valley, CA, 108 min
62-0707, Jehovah-Jireh #3, Municipal Auditorium, Grass Valley, CA, 107 min
62-0706, Jehovah-Jireh #2, Municipal Auditorium, Grass Valley, CA, 108 min
62-0705, Jehovah-Jireh #1, Municipal Auditorium, Grass Valley, CA, 103 min
62-0704, We Would See Jesus, Municipal Auditorium, Grass Valley, CA, 98 min
62-0701, To Take On The Whole Armor Of God, National Guard Armory, Santa Maria, CA, 114 min
62-0630E, The Meanest Man In Santa Maria, National Guard Armory, Santa Maria, CA, 96 min
62-0630B, It Wasn't So From The Beginning, Villa Motel, Santa Maria, CA, 56 min
62-0629, Be Not Afraid, It Is I, National Guard Armory, Santa Maria, CA, 97 min
62-0628, A Greater Than Solomon Is Here, National Guard Armory, Santa Maria, CA, 114 min
62-0627, We Would See Jesus, National Guard Armory, Santa Maria, CA, 103 min
62-0624, Super Sign, Great Western Exhibit Center, South Gate, CA, 103 min
62-0623, Perseverant, Great Western Exhibit Center, South Gate, CA, 123 min
62-0622E, Why?, Great Western Exhibit Center, South Gate, CA, 75 min
62-0622B, Letting Off The Pressure, Clifton's Cafeteria, Los Angeles, CA, 50 min
62-0621E, Confirmation And Evidence, Great Western Exhibit Center, South Gate, CA, 68 min
62-0621B, The Path Of Life, First Hebrew Christian Synagogue, South Gate, CA, 74 min
62-0620, Be Not Afraid, Great Western Exhibit Center, South Gate, CA, 104 min
62-0612, Behold, A Greater Than Solomon Is Here, Central Assembly Of God, Columbia, SC, 102 min
62-0611, It Is I, Be Not Afraid, Central Assembly Of God, Columbia, SC, 114 min
62-0610M, Presuming, Bible Tabernacle, Southern Pines, NC, 113 min
62-0610E, Convinced Then Concerned, Bible Tabernacle, Southern Pines, NC, 85 min
62-0609M, Show Us The Father And It Will Sufficeth Us, Bible Tabernacle, Southern Pines, NC, 51 min
62-0609E, Letting Off The Pressure, Bible Tabernacle, Southern Pines, NC, 100 min
62-0608, Perseverance, Bible Tabernacle, Southern Pines, NC, 145 min
62-0607, Putting On The Whole Armor Of God, Bible Tabernacle, Southern Pines, NC, 126 min
62-0603, The End-Time Evangelism, Branham Tabernacle, Jeffersonville, IN, 139 min
62-0601, Taking Sides With Jesus, Branham Tabernacle, Jeffersonville, IN, 144 min
62-0531, The Conflict Between God And Satan, Faith Assembly, Clarksville, IN, 116 min
62-0527, Questions And Answers, Branham Tabernacle, Jeffersonville, IN, 123 min
62-0521, Convinced And Then Concerned, Stephen Mather High School, Chicago, IL, 78 min
62-0520, Perseverance, Stephen Mather High School, Chicago, IL, 116 min
62-0519, Fellowship, American Baptist Assembly, Green Lake, WI, 73 min
62-0518, Letting Off The Pressure, American Baptist Assembly, Green Lake, WI, 116 min
62-0513M, The Way Of A True Prophet Of God, Branham Tabernacle, Jeffersonville, IN, 140 min
62-0513E, Letting Off The Pressure, Gospel Tabernacle, Jeffersonville, IN, 73 min
62-0506, Possessing All Things, Branham Tabernacle, Jeffersonville, IN, 91 min
62-0422, The Restoration Of The Bride Tree, Branham Tabernacle, Jeffersonville, IN, 214 min
62-0408, Presuming, Church Of Faith, Cleveland, TN, 99 min
62-0407, The Sign Of His Coming, Church Of Faith, Cleveland, TN, 152 min
62-0401, Wisdom Versus Faith, Branham Tabernacle, Jeffersonville, IN, 189 min
62-0319, The End-Time Sign Seed, Tifton Junior High School, Tifton, GA, 85 min
62-0318m, The Spoken Word Is The Original Seed - Pt. 1, Branham Tabernacle, Jeffersonville, IN, 195 min
62-0318a, The Spoken Word Is The Original Seed - Pt. 2, Branham Tabernacle, Jeffersonville, IN, 172 min
62-0318, The Spoken Word Is The Original Seed, Branham Tabernacle, Jeffersonville, IN, 372 min
62-0313, Expressions, Branham Tabernacle, Jeffersonville, IN, 49 min
62-0311, The Greatest Battle Ever Fought, Branham Tabernacle, Jeffersonville, IN, 172 min
62-0218, Perseverance, Branham Tabernacle, Jeffersonville, IN, 167 min
62-0211, Oneness, Branham Tabernacle, Jeffersonville, IN, 143 min
62-0204, Communion, Branham Tabernacle, Jeffersonville, IN, 86 min
62-0129, Explaining The Ministry, Ramada Inn, Phoenix, AZ, 29 min
62-0128M, Unbelief Does Not Hinder God, Church Of God, Phoenix, AZ, 63 min
62-0128A, A Paradox, Ramada Inn, Phoenix, AZ, 106 min
62-0127, Meanest Man I Know, Ramada Inn, Phoenix, AZ, 106 min
62-0124, Have Not I Sent Thee?, Assembly Of God, Phoenix, AZ, 118 min
62-0123, Forsaking All, Full Gospel Church, Tempe, AZ, 120 min
62-0122, Confirmation Of The Commission, Assembly Of God, Tempe, AZ, 126 min
62-0121M, And Thy Seed Shall Possess The Gate Of His Enemy, Faith Tabernacle, Phoenix, AZ, 99 min
62-0121E, The Marriage Of The Lamb, Fellowship Tabernacle, Phoenix, AZ, 122 min
62-0120, The Unchangeable God Working In An Unexpectable Way, Assembly Of God, Phoenix, AZ, 101 min
62-0119, An Ensign, Jesus Name Church, Phoenix, AZ, 107 min
62-0118, Convinced Then Concerned, Full Gospel Church, Tempe, AZ, 125 min
62-0117, Presuming, Gospel Echoes, Phoenix, AZ, 173 min
61-1231M, You Must Be Born Again, Branham Tabernacle, Jeffersonville, IN, 170 min
61-1231E, If God Be With Us, Then Where Is All The Miracles?, Branham Tabernacle, Jeffersonville, IN, 121 min
61-1224, Sirs, We Would See Jesus, Branham Tabernacle, Jeffersonville, IN, 133 min
61-1217, Christianity Versus Idolatry, Branham Tabernacle, Jeffersonville, IN, 134 min
61-1210, Paradox, Branham Tabernacle, Jeffersonville, IN, 156 min
61-1119, Perfect Strength By Perfect Weakness, Branham Tabernacle, Jeffersonville, IN, 144 min
61-1112, A True Sign That's Overlooked, Branham Tabernacle, Jeffersonville, IN, 147 min
61-1105, The Testimony Of A True Witness, Branham Tabernacle, Jeffersonville, IN, 121 min
61-1015M, Questions And Answers, Branham Tabernacle, Jeffersonville, IN, 126 min
61-1015E, Respects, Branham Tabernacle, Jeffersonville, IN, 95 min
61-1001M, It Becometh Us To Fulfill All Righteousness, Branham Tabernacle, Jeffersonville, IN, 112 min
61-1001E, The Comforter, Branham Tabernacle, Jeffersonville, IN, 95 min
61-0903, Let Your Light So Shine Before Men, Branham Tabernacle, Jeffersonville, IN, 64 min
61-0827, The Message Of Grace, Branham Tabernacle, Jeffersonville, IN, 136 min
61-0813, Faith, Branham Tabernacle, Jeffersonville, IN, 27 min
61-0808, Thy House, House Meeting, Tifton, GA, 99 min
61-0806, The Seventieth Week Of Daniel, Branham Tabernacle, Jeffersonville, IN, 136 min
61-0730M, Gabriel's Instructions To Daniel, Branham Tabernacle, Jeffersonville, IN, 131 min
61-0730E, The Sixfold Purpose Of Gabriel's Visit To Daniel, Branham Tabernacle, Jeffersonville, IN, 121 min
61-0723M, The Ever-Present Water From The Rock, Branham Tabernacle, Jeffersonville, IN, 106 min
61-0723E, God Being Misunderstood, Branham Tabernacle, Jeffersonville, IN, 128 min
61-0618, Revelation, Chapter Five #2, Branham Tabernacle, Jeffersonville, IN, 117 min
61-0611, Revelation, Chapter Five #1, Branham Tabernacle, Jeffersonville, IN, 81 min
61-0521, Show Us The Father, United Church, Dawson Creek, BC, 113 min
61-0520, From That Time, United Church, Dawson Creek, BC, 105 min
61-0519, Sirs, We Would See Jesus, United Church, Dawson Creek, BC, 104 min
61-0517, It Is I, Zion Gospel Tabernacle, Grand Prairie, AB, 112 min
61-0516M, God's Provided Way, Zion Gospel Tabernacle, Grand Prairie, AB, 55 min
61-0516A, Jesus Christ The Same Yesterday, Today, And Forever, Zion Gospel Tabernacle, Grand Prairie, AB, 114 min
61-0515, A Greater Than Solomon Is Here, Zion Gospel Tabernacle, Grand Prairie, AB, 126 min
61-0430, Super Sign, Stephen Mather High School, Chicago, IL, 70 min
61-0429E, The Uncertain Sound, Stephen Mather High School, Chicago, IL, 94 min
61-0429B, One Of The Meanest Men In Town, Stephen Mather High School, Chicago, IL, 73 min
61-0428, Getting In The Spirit, Stephen Mather High School, Chicago, IL, 114 min
61-0427, Only Believe, Stephen Mather High School, Chicago, IL, 92 min
61-0426, Micaiah The Prophet, Stephen Mather High School, Chicago, IL, 97 min
61-0425E, The Forgotten Beatitude, Stephen Mather High School, Chicago, IL, 71 min
61-0425B, The Godhead Explained, Holiday Inn, Chicago, IL, 101 min
61-0424, The Greatest News Flash In History, Stephen Mather High School, Chicago, IL, 103 min
61-0423, Abraham And His Seed After Him, Stephen Mather High School, Chicago, IL, 111 min
61-0416, Abraham And His Seed After Him, Illinois Wesleyan University, Bloomington, IL, 116 min
61-0415E, The Uncertain Sound, Illinois Wesleyan University, Bloomington, IL, 124 min
61-0415B, From That Time, Illinois Wesleyan University, Bloomington, IL, 58 min
61-0414, Be Not Afraid, It Is I, Illinois Wesleyan University, Bloomington, IL, 107 min
61-0413, Why?, Illinois Wesleyan University, Bloomington, Il, 122 min
61-0412, A Greater Than Solomon Is Here, Illinois Wesleyan University, Bloomington, IL, 114 min
61-0411, But It Wasn't So From The Beginning, Illinois Wesleyan University, Bloomington, IL, 126 min
61-0410, Conferences, Illinois Wesleyan University, Bloomington, IL, 100 min
61-0409, Sirs, We Would See Jesus, Illinois Wesleyan University, Bloomington, IL, 109 min
61-0402, The True Easter Seal, Branham Tabernacle, Jeffersonville, IN, 115 min
61-0319, Jezebel Religion, National Guard Armory Middle, Middletown, OH, 110 min
61-0318, Abraham's Covenant Confirmed, National Guard Armory, Middletown, OH, 127 min
61-0317, Abraham's Grace Covenant, National Guard Armory, Middletown, OH, 126 min
61-0316, The Church Choosing Law For Grace, National Guard Armory, Middletown, OH, 102 min
61-0315, An Uncertain Sound, Full Gospel Tabernacle, Middletown, OH, 112 min
61-0312, Faithful Abraham, Lyric Building, Richmond, VA, 121 min
61-0311, Be Not Afraid, Lyric Building, Richmond, VA, 115 min
61-0308, Expectations, Lyric Building, Richmond, VA, 92 min
61-0305, Beyond The Curtain Of Time, Branham Tabernacle, Jeffersonville, IN, 52 min
61-0226, Jehovah-Jireh, Fairgrounds Auditorium, Tulare, CA, 97 min
61-0224, Be Not Afraid, Fairgrounds Auditorium, Tulare, CA, 115 min
61-0219, The Queen Of Sheba, Long Beach Municipal Auditorium, Long Beach, CA, 115 min
61-0218, Balm In Gilead, First Assembly Of God Of Long Beach, Long Beach, CA, 117 min
61-0217, The Mark Of The Beast And The Seal Of God #2, First Assembly Of God Of Long Beach, Long Beach, CA, 98 min
61-0216, The Mark Of The Beast And The Seal Of God #1, First Assembly Of God Of Long Beach, Long Beach, CA, 117 min
61-0215, Thou Son Of David, Have Mercy On Me, First Assembly Of God Of Long Beach, Long Beach, CA, 99 min
61-0214, The Basis Of Fellowship, First Assembly Of God Of Long Beach, Long Beach, CA, 82 min
61-0213, It Is I, Be Not Afraid, First Assembly Of God Of Long Beach, Long Beach, CA, 102 min
61-0212M, Jehovah-Jireh, First Assembly Of God Of Long Beach, Long Beach, CA, 57 min
61-0212E, And Thy Seed Shall Possess The Gate Of His Enemies, First Assembly Of God Of Long Beach, Long Beach, CA, 57 min
61-0211, Abraham, First Assembly Of God Of Long Beach, Long Beach, CA, 107 min
61-0210, Abraham's Covenant Confirmed, First Assembly Of God Of Long Beach, Long Beach, CA, 94 min
61-0209, Jehovah-Jireh, First Assembly Of God Of Long Beach, Long Beach, CA, 106 min
61-0208, Sirs, We Would See Jesus, First Assembly Of God Of Long Beach, Long Beach, CA, 107 min
61-0207, Expectation, First Assembly Of God Of Long Beach, Long Beach, CA, 88 min
61-0205M, Expectation, Central Assembly Of God, Tucson, AZ, 73 min
61-0205E, Jesus Christ The Same Yesterday, Today, And Forever, Central Assembly Of God, Tucson, AZ, 117 min
61-0129, Turning Northward, Westward Ho Hotel, Phoenix, AZ, 51 min
61-0128, Why?, Westward Ho Hotel, Phoenix, AZ, 91 min
61-0125, Why?, American Legion Hall, Beaumont, TX, 99 min
61-0124, Blind Bartimaeus, American Legion Hall, Beaumont, TX, 112 min
61-0123, Be Not Afraid, It Is I, American Legion Hall, Beaumont, TX, 114 min
61-0122, As The Eagle Stirs Her Nest, American Legion Hall, Beaumont, TX, 95 min
61-0121, Mary's Belief, American Legion Hall, Beaumont, TX, 84 min
61-0120, Things That Wasn't So From The Beginning, American Legion Hall, Beaumont, TX, 20 min
61-0119E, Queen Of Sheba, American Legion Hall, Beaumont, TX, 123 min
61-0119A, The Water Baptism, Golden Arrow Restaurant, Beaumont, TX, 85 min
61-0118, Jesus Christ The Same Yesterday, Today, And Forever, American Legion Hall, Beaumont, TX, 110 min
61-0117, The Messiah, Life Tabernacle, Shreveport, LA, 105 min
61-0112, Questions And Answers, Branham Tabernacle, Jeffersonville, IN, 181 min
61-0108, Revelation, Chapter Four #3, Branham Tabernacle, Jeffersonville, IN, 187 min
61-0101, Revelation, Chapter Four #2, Branham Tabernacle, Jeffersonville, IN, 149 min
60-1231, Revelation, Chapter Four #1, Branham Tabernacle, Jeffersonville, IN, 86 min
60-1225, God's Wrapped Gift, Branham Tabernacle, Jeffersonville, IN, 113 min
60-1218, The Uncertain Sound, Branham Tabernacle, Jeffersonville, IN, 172 min
60-1211M, The Ten Virgins, And The Hundred And Forty-Four Thousand Jews, Branham Tabernacle, Jeffersonville, IN, 169 min
60-1211E, The Laodicean Church Age, Branham Tabernacle, Jeffersonville, IN, 146 min
60-1210, The Philadelphian Church Age, Branham Tabernacle, Jeffersonville, IN, 125 min
60-1209, The Sardisean Church Age, Branham Tabernacle, Jeffersonville, IN, 112 min
60-1208, The Thyatirean Church Age, Branham Tabernacle, Jeffersonville, IN, 101 min
60-1207, The Pergamean Church Age, Branham Tabernacle, Jeffersonville, IN, 163 min
60-1206, The Smyrnaean Church Age, Branham Tabernacle, Jeffersonville, IN, 115 min
60-1205, The Ephesian Church Age, Branham Tabernacle, Jeffersonville, IN, 147 min
60-1204M, The Revelation Of Jesus Christ, Branham Tabernacle, Jeffersonville, IN, 152 min
60-1204E, The Patmos Vision, Branham Tabernacle, Jeffersonville, IN, 168 min
60-1127M, It Wasn't So From The Beginning, Life Tabernacle, Shreveport, LA, 48 min
60-1127E, The Queen Of The South, Life Tabernacle, Shreveport, LA, 111 min
60-1126, Why?, Life Tabernacle, Shreveport, LA, 115 min
60-1125, Conference, Life Tabernacle, Shreveport, LA, 97 min
60-1124, It Is I, Life Tabernacle, Shreveport, LA, 53 min
60-1113, Condemnation By Representation, Branham Tabernacle, Jeffersonville, IN, 115 min
60-1002, The Kinsman Redeemer, Branham Tabernacle, Jeffersonville, IN, 120 min
60-0930, Visions Of William Branham, Campaign Office, Jeffersonville, IN, 121 min
60-0925, That Day On Calvary, Branham Tabernacle, Jeffersonville, IN, 78 min
60-0911M, As I Was With Moses, So I Will Be With Thee, Branham Tabernacle, Jeffersonville, IN, 127 min
60-0911E, Five Definite Identifications Of The True Church Of The Living God, Branham Tabernacle, Jeffersonville, IN, 114 min
60-0807, Debate On Tongues, Yakima, WA, 38 min
60-0806, Hear Ye Him, Eisenhower High School, Yakima, WA, 77 min
60-0805, Lamb And Dove, Eisenhower High School, Yakima, WA, 103 min
60-0804, As The Eagle Stirreth Up Her Nest, Eisenhower High School, Yakima, WA, 104 min
60-0803, Jehovah-Jireh, Eisenhower High School, Yakima, WA, 100 min
60-0802, El-Shaddai, Eisenhower High School, Yakima, WA, 109 min
60-0731, Show Us The Father And It Will Satisfy Us, Eisenhower High School, Yakima, WA, 103 min
60-0729, What It Takes To Overcome All Unbelief: Our Faith, Eisenhower High School, Yakima, WA, 102 min
60-0724, The Unchangeable Word Of God, Lake County Fairgrounds, Lakeport, CA, 115 min
60-0723, Speak To The Rock And It Shall Give Forth His Water, Lake County Fairgrounds, Lakeport, CA, 75 min
60-0722, Watchman, What Of The Night?, Lake County Fairgrounds, Lakeport, CA, 100 min
60-0720, Be not Afraid, It Is I, Lake County Fairgrounds, Lakeport, CA, 108 min
60-0717, Be Not Afraid, City High School, Klamath Falls, OR, 111 min
60-0716, From That Time, City High School, Klamath Falls, OR, 126 min
60-0713, Blind Bartimaeus, City High School, Klamath Falls, OR, 115 min
60-0712, Hear Ye Him, City High School, Klamath Falls, OR, 103 min
60-0711, The Door Inside The Door, City High School, Klamath Falls, OR, 101 min
60-0710, The Queen Of Sheba, City High School, Klamath Falls, OR, 120 min
60-0709, God's Provided Way Of Approach To Fellowship, City High School, Klamath Falls, OR, 109 min
60-0708, Sir, We Would See Jesus, City High School, Klamath Falls, OR, 105 min
60-0630, God's Provided Approach To Divine Fellowship, Abundant Life Building, Tulsa, OK, 57 min
60-0626, The Unfailing Realities Of The Living God, Branham Tabernacle, Jeffersonville, IN, 98 min
60-0612, Speak To This Rock, Miami Valley Chautauqua Campgrounds, Chautauqua, OH, 68 min
60-0611E, Faith Is The Sixth Sense, Miami Valley Chautauqua Campgrounds, Chautauqua, OH, 72 min
60-0611B, Fellowship, Manchester Hotel, Middletown, OH, 67 min
60-0610, The Rejected King, Miami Valley Chautauqua Campgrounds, Chautauqua, OH, 94 min
60-0609, Be Not Afraid, Miami Valley Chautauqua Campgrounds, Chautauqua, OH, 86 min
60-0608, Having Conferences, Miami Valley Chautauqua Campgrounds, Chautauqua, OH, 117 min
60-0607, Hearing, Receiving, And Acting, Miami Valley Chautauqua Campgrounds, Chautauqua, OH, 85 min
60-0606, To Whom Would We Go?, Miami Valley Chautauqua Campgrounds, Chautauqua, OH, 94 min
60-0604, To Whom Shall We Go?, Gospel Tabernacle, Jeffersonville, IN, 95 min
60-0522M, Position in Christ, Branham Tabernacle, Jeffersonville, IN, 121 min
60-0522E, Adoption , Branham Tabernacle, Jeffersonville, IN, 122 min
60-0518, Manifested Sons of God, Branham Tabernacle, Jeffersonville, IN, 123 min
60-0515M, The Rejected King, Branham Tabernacle, Jeffersonville, IN, 128 min
60-0515E, Adoption #1, Branham Tabernacle, Jeffersonville, IN, 116 min
60-0417S, I Know, Branham Tabernacle, Jeffersonville, IN, 53 min
60-0417M, Go, Tell, Branham Tabernacle, Jeffersonville, IN, 129 min
60-0403, As The Eagle Stirreth, Municipal Auditorium, Tulsa, OK, 107 min
60-0402, Believest Thou This?, Municipal Auditorium, Tulsa, OK, 63 min
60-0401M, Why?, First Apostolic Church, Tulsa, OK, 32 min
60-0401E, The Queen Of Sheba, Municipal Auditorium, Tulsa, OK, 84 min
60-0331, From That Time, Municipal Auditorium, Tulsa, OK, 73 min
60-0330, Blind Bartimaeus, Municipal Auditorium, Tulsa, OK, 65 min
60-0329, It Is I, Be Not Afraid, Municipal Auditorium, Tulsa, OK, 71 min
60-0328, Is There Anything Too Hard For The Lord?, Municipal Auditorium, Tulsa, OK, 53 min
60-0326, The Unchangeable God, Municipal Auditorium, Tulsa, OK, 50 min
60-0313, Hear Ye Him, Madison Square Garden, Phoenix, AZ, 101 min
60-0312, Door To The Heart, Madison Square Garden, Phoenix, AZ, 94 min
60-0311, Mary's Belief, Madison Square Garden, Phoenix, AZ, 79 min
60-0310, Elijah And The Meal-Offering, Madison Square Garden, Phoenix, AZ, 84 min
60-0309, Why?, Madison Square Garden, Phoenix, AZ, 83 min
60-0308, Discernment Of Spirit, First Assembly Of God, Phoenix, AZ, 66 min
60-0306, It Wasn't So From The Beginning, Madison Square Garden, Phoenix, AZ, 69 min
60-0305, Be Not Afraid, It Is I, Madison Square Garden, Phoenix, AZ, 93 min
60-0304, Thirsting For Life, Madison Square Garden, Phoenix, AZ, 87 min
60-0303, Former And Latter Rain, Madison Square Garden, Phoenix, AZ, 73 min
60-0302, From That Time, Madison Square Garden, Phoenix, AZ, 98 min
60-0301, He Careth For You, First Assembly Of God, Phoenix, AZ, 74 min
60-0229, The Oncoming Storm, First Assembly Of God, Phoenix, AZ, 80 min
60-0228, Conferences, First Assembly Of God, Phoenix, AZ, 73 min
60-0221, Hearing, Recognizing, Acting On The Word Of God, Branham Tabernacle, Jeffersonville, IN, 114 min
60-0210M, The Revelation That Was Given To Me, Escambron Beach Club, San Juan, PR, 98 min
60-0210E, And From That Time, San Juan, Puerto Rico, 69 min
60-0110, The Queen Of Sheba, Tift County Courthouse, Tifton, GA, 124 min
60-0109, Sirs, We Would See Jesus, Tift County Courthouse, Tifton, GA, 114 min
60-0108, Conference With God, Unity Tabernacle, Tifton, GA, 64 min
LIST;

        $lines = explode("\n", $list);
        foreach($lines as $line) {
            $parts = explode(", ", $line);
            try{
                $date = $this->convertCodeToDate($parts[0]);
                if(is_bool($date)) {
                    echo $parts[0];
                    throw new Exception('Invalid date');
                }
                $partsLength = count($parts);
                if(strlen($parts[$partsLength-2])==2){
                    $title = implode("," , array_slice($parts, 1, $partsLength-5));
                    $location = $parts[$partsLength-4] . ',  '. $parts[$partsLength-3] . ',  ' . $parts[$partsLength-2];
                }else{
                    $location = $parts[$partsLength-3] . ',  ' . $parts[$partsLength-2];
                    $title = implode("," , array_slice($parts, 1, $partsLength-4));
                }
                $message = [
                    'code' => $parts[0],
                    'title' => $title,
                    'date_preached'=> $this->convertCodeToDate($parts[0]),
                    'location' =>$location,
                    'duration' => $this->convertDurationToInt($parts[$partsLength-1]),
                    'image_url' => 'https://via.placeholder.com/150',
                ];
            Message::create($message);

            }catch (Exception $e){
                echo $e->getMessage();
                echo $parts[0];
            }
        }

        // Insert data into the messages table
    }
    function convertCodeToDate($code){
        $parts = explode('-', $code);

        if (ctype_alpha(substr($parts[1], -1))) {
            $parts[1] = substr($parts[1], 0, -1);
        }
        return DateTime::createFromFormat('Y-m-d', "19".$parts[0] . '-' . substr($parts[1], 0, 2) . '-' . substr($parts[1], 2));
    }
    function convertDurationToInt($duration){
        $duration = explode(' ', $duration);
        return (int) $duration[0];
    }
}
