namespace MVCworkorderDB.Models
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel.DataAnnotations;
    using System.ComponentModel.DataAnnotations.Schema;
    using System.Data.Entity.Spatial;

    public partial class managers
    {
        [System.Diagnostics.CodeAnalysis.SuppressMessage("Microsoft.Usage", "CA2214:DoNotCallOverridableMethodsInConstructors")]
        public managers()
        {
            companys = new HashSet<companys>();
        }

        [Key]
        [DatabaseGenerated(DatabaseGeneratedOption.None)]
        public int roll_num { get; set; }

        [Required]
        [StringLength(25)]
        public string first_name { get; set; }

        [Required]
        [StringLength(25)]
        public string last_name { get; set; }

        public int? department_id { get; set; }

        [StringLength(10)]
        public string phone { get; set; }

        [Column(TypeName = "date")]
        public DateTime admission_date { get; set; }

        public int cet_companys { get; set; }

        [StringLength(25)]
        public string password { get; set; }

        public virtual departments departments { get; set; }

        [System.Diagnostics.CodeAnalysis.SuppressMessage("Microsoft.Usage", "CA2227:CollectionPropertiesShouldBeReadOnly")]
        public virtual ICollection<companys> companys { get; set; }


        //
        public List<managers> managersList = new List<managers>();

        public List<managers> ReturnList()
        {
            managersList.Add(new managers() { roll_num = 1, first_name = "Andro",password="1234"});

            managersList.Add(new managers() { roll_num = 2, first_name = "Dragan", password = "1234" });

            managersList.Add(new managers() { roll_num = 3, first_name = "Mario", password = "1234" });

            return managersList;
        }


    }
}
