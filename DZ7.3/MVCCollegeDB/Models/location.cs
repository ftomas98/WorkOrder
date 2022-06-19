namespace MVCworkorderDB.Models
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel.DataAnnotations;
    using System.ComponentModel.DataAnnotations.Schema;
    using System.Data.Entity.Spatial;

    public partial class locations
    {
        [System.Diagnostics.CodeAnalysis.SuppressMessage("Microsoft.Usage", "CA2214:DoNotCallOverridableMethodsInConstructors")]
        public locations()
        {
            companys = new HashSet<companys>();
        }

        [DatabaseGenerated(DatabaseGeneratedOption.None)]
        public int id { get; set; }

        public int department_id { get; set; }

        public int start_date { get; set; }

        public int end_date { get; set; }

        [Required]
        [StringLength(50)]
        public string name { get; set; }

        public int faculty_id { get; set; }

        public virtual departments departments { get; set; }

        public virtual faculty faculty { get; set; }

        [System.Diagnostics.CodeAnalysis.SuppressMessage("Microsoft.Usage", "CA2227:CollectionPropertiesShouldBeReadOnly")]
        public virtual ICollection<companys> companys { get; set; }
    }
}
